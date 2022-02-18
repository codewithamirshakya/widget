<?php

namespace App\GraphQL\Directives;

use Closure;
use GraphQL\Language\AST\TypeDefinitionNode;
use GraphQL\Language\AST\TypeExtensionNode;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Auth\AuthServiceProvider;
use Nuwave\Lighthouse\Exceptions\AuthenticationException;
use Nuwave\Lighthouse\Schema\AST\ASTHelper;
use Nuwave\Lighthouse\Schema\AST\DocumentAST;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldMiddleware;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Nuwave\Lighthouse\Support\Contracts\TypeExtensionManipulator;
use Nuwave\Lighthouse\Support\Contracts\TypeManipulator;

class AuthGuardDirective extends BaseDirective implements FieldMiddleware, TypeManipulator, TypeExtensionManipulator
{
    /**
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }

    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'GRAPHQL'
                directive @authGuard on FIELD_DEFINITION
                GRAPHQL;
    }

    public function handleField(FieldValue $fieldValue, Closure $next): FieldValue
    {
        $previousResolver = $fieldValue->getResolver();

        $fieldValue->setResolver(
            function ($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) use ($previousResolver) {
                // TODO remove cast in v6
                $with = (array) (
                    $this->directiveArgValue('with')
                    ?? [AuthServiceProvider::guard()]
                );

                $this->authenticate($with);

                return $previousResolver($root, $args, $context, $resolveInfo);
            }
        );

        return $next($fieldValue);
    }

    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  array<string|null>  $guards
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate(array $guards): void
    {
        if(request()->header('Authorization')) {
            return;
        }

        $this->unauthenticated($guards);
    }

    /**
     * Handle an unauthenticated user.
     *
     * @param array<string|null> $guards
     * @throws AuthenticationException
     */
    protected function unauthenticated(array $guards): void
    {
        throw new AuthenticationException(
            AuthenticationException::MESSAGE,
            $guards
        );
    }

    public function manipulateTypeDefinition(DocumentAST &$documentAST, TypeDefinitionNode &$typeDefinition): void
    {
        ASTHelper::addDirectiveToFields($this->directiveNode, $typeDefinition);
    }

    public function manipulateTypeExtension(DocumentAST &$documentAST, TypeExtensionNode &$typeExtension): void
    {
        ASTHelper::addDirectiveToFields($this->directiveNode, $typeExtension);
    }
}
