<?php
// RoundFunction.php

namespace App\DQL;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\TokenType;


/**
 * RoundFunction ::= "Round" "(" ArithmeticPrimary "," ArithmeticPrimary ")"
 */
class Round extends FunctionNode
{
    // (1)
    public $firstDateExpression = null;
    public $secondDateExpression = null;

    public function parse(Parser $parser):void
    {
        $parser->match(TokenType::T_IDENTIFIER); // (2)
        $parser->match(TokenType::T_OPEN_PARENTHESIS); // (3)
        $this->firstDateExpression = $parser->ArithmeticPrimary(); // (4)
        $parser->match(TokenType::T_COMMA); // (5)
        $this->secondDateExpression = $parser->ArithmeticPrimary(); // (6)
        $parser->match(TokenType::T_CLOSE_PARENTHESIS); // (3)
    }

    public function getSql(SqlWalker $sqlWalker):string
    {
        return 'ROUND(' .
            $this->firstDateExpression->dispatch($sqlWalker) . ', ' .
            $this->secondDateExpression->dispatch($sqlWalker) .
        ')'; // (7)
    }
}
