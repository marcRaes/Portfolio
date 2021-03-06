<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad1dba75f907023596517ce1fe335cff
{
    public static $files = array (
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Portfolio\\' => 10,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'E' => 
        array (
            'Egulias\\EmailValidator\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Portfolio\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Egulias\\EmailValidator\\' => 
        array (
            0 => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator',
        ),
    );

    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Doctrine\\Common\\Lexer\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/lexer/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Doctrine\\Common\\Lexer\\AbstractLexer' => __DIR__ . '/..' . '/doctrine/lexer/lib/Doctrine/Common/Lexer/AbstractLexer.php',
        'Egulias\\EmailValidator\\EmailLexer' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/EmailLexer.php',
        'Egulias\\EmailValidator\\EmailParser' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/EmailParser.php',
        'Egulias\\EmailValidator\\EmailValidator' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/EmailValidator.php',
        'Egulias\\EmailValidator\\Exception\\AtextAfterCFWS' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/AtextAfterCFWS.php',
        'Egulias\\EmailValidator\\Exception\\CRLFAtTheEnd' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/CRLFAtTheEnd.php',
        'Egulias\\EmailValidator\\Exception\\CRLFX2' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/CRLFX2.php',
        'Egulias\\EmailValidator\\Exception\\CRNoLF' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/CRNoLF.php',
        'Egulias\\EmailValidator\\Exception\\CharNotAllowed' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/CharNotAllowed.php',
        'Egulias\\EmailValidator\\Exception\\CommaInDomain' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/CommaInDomain.php',
        'Egulias\\EmailValidator\\Exception\\ConsecutiveAt' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ConsecutiveAt.php',
        'Egulias\\EmailValidator\\Exception\\ConsecutiveDot' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ConsecutiveDot.php',
        'Egulias\\EmailValidator\\Exception\\DomainHyphened' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/DomainHyphened.php',
        'Egulias\\EmailValidator\\Exception\\DotAtEnd' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/DotAtEnd.php',
        'Egulias\\EmailValidator\\Exception\\DotAtStart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/DotAtStart.php',
        'Egulias\\EmailValidator\\Exception\\ExpectedQPair' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingQPair.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingAT' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingAT.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingATEXT' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingATEXT.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingCTEXT' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingCTEXT.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingDTEXT' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingDTEXT.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingDomainLiteralClose' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingDomainLiteralClose.php',
        'Egulias\\EmailValidator\\Exception\\InvalidEmail' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/InvalidEmail.php',
        'Egulias\\EmailValidator\\Exception\\NoDNSRecord' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/NoDNSRecord.php',
        'Egulias\\EmailValidator\\Exception\\NoDomainPart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/NoDomainPart.php',
        'Egulias\\EmailValidator\\Exception\\NoLocalPart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/NoLocalPart.php',
        'Egulias\\EmailValidator\\Exception\\UnclosedComment' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/UnclosedComment.php',
        'Egulias\\EmailValidator\\Exception\\UnclosedQuotedString' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/UnclosedQuotedString.php',
        'Egulias\\EmailValidator\\Exception\\UnopenedComment' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/UnopenedComment.php',
        'Egulias\\EmailValidator\\Parser\\DomainPart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Parser/DomainPart.php',
        'Egulias\\EmailValidator\\Parser\\LocalPart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Parser/LocalPart.php',
        'Egulias\\EmailValidator\\Parser\\Parser' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Parser/Parser.php',
        'Egulias\\EmailValidator\\Validation\\DNSCheckValidation' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/DNSCheckValidation.php',
        'Egulias\\EmailValidator\\Validation\\EmailValidation' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/EmailValidation.php',
        'Egulias\\EmailValidator\\Validation\\Error\\RFCWarnings' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/Error/RFCWarnings.php',
        'Egulias\\EmailValidator\\Validation\\Error\\SpoofEmail' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/Error/SpoofEmail.php',
        'Egulias\\EmailValidator\\Validation\\Exception\\EmptyValidationList' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/Exception/EmptyValidationList.php',
        'Egulias\\EmailValidator\\Validation\\MultipleErrors' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/MultipleErrors.php',
        'Egulias\\EmailValidator\\Validation\\MultipleValidationWithAnd' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/MultipleValidationWithAnd.php',
        'Egulias\\EmailValidator\\Validation\\NoRFCWarningsValidation' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/NoRFCWarningsValidation.php',
        'Egulias\\EmailValidator\\Validation\\RFCValidation' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/RFCValidation.php',
        'Egulias\\EmailValidator\\Validation\\SpoofCheckValidation' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/SpoofCheckValidation.php',
        'Egulias\\EmailValidator\\Warning\\AddressLiteral' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/AddressLiteral.php',
        'Egulias\\EmailValidator\\Warning\\CFWSNearAt' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/CFWSNearAt.php',
        'Egulias\\EmailValidator\\Warning\\CFWSWithFWS' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/CFWSWithFWS.php',
        'Egulias\\EmailValidator\\Warning\\Comment' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/Comment.php',
        'Egulias\\EmailValidator\\Warning\\DeprecatedComment' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/DeprecatedComment.php',
        'Egulias\\EmailValidator\\Warning\\DomainLiteral' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/DomainLiteral.php',
        'Egulias\\EmailValidator\\Warning\\DomainTooLong' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/DomainTooLong.php',
        'Egulias\\EmailValidator\\Warning\\EmailTooLong' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/EmailTooLong.php',
        'Egulias\\EmailValidator\\Warning\\IPV6BadChar' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6BadChar.php',
        'Egulias\\EmailValidator\\Warning\\IPV6ColonEnd' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6ColonEnd.php',
        'Egulias\\EmailValidator\\Warning\\IPV6ColonStart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6ColonStart.php',
        'Egulias\\EmailValidator\\Warning\\IPV6Deprecated' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6Deprecated.php',
        'Egulias\\EmailValidator\\Warning\\IPV6DoubleColon' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6DoubleColon.php',
        'Egulias\\EmailValidator\\Warning\\IPV6GroupCount' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6GroupCount.php',
        'Egulias\\EmailValidator\\Warning\\IPV6MaxGroups' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6MaxGroups.php',
        'Egulias\\EmailValidator\\Warning\\LabelTooLong' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/LabelTooLong.php',
        'Egulias\\EmailValidator\\Warning\\LocalTooLong' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/LocalTooLong.php',
        'Egulias\\EmailValidator\\Warning\\NoDNSMXRecord' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/NoDNSMXRecord.php',
        'Egulias\\EmailValidator\\Warning\\ObsoleteDTEXT' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/ObsoleteDTEXT.php',
        'Egulias\\EmailValidator\\Warning\\QuotedPart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/QuotedPart.php',
        'Egulias\\EmailValidator\\Warning\\QuotedString' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/QuotedString.php',
        'Egulias\\EmailValidator\\Warning\\TLD' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/TLD.php',
        'Egulias\\EmailValidator\\Warning\\Warning' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/Warning.php',
        'PHPMailer\\PHPMailer\\Exception' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/Exception.php',
        'PHPMailer\\PHPMailer\\OAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuth.php',
        'PHPMailer\\PHPMailer\\PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/PHPMailer.php',
        'PHPMailer\\PHPMailer\\POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/POP3.php',
        'PHPMailer\\PHPMailer\\SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/SMTP.php',
        'Portfolio\\Candidate' => __DIR__ . '/../..' . '/src/Candidate.php',
        'Portfolio\\Captcha' => __DIR__ . '/../..' . '/src/Captcha.php',
        'Portfolio\\Controller' => __DIR__ . '/../..' . '/src/Controller.php',
        'Portfolio\\Field' => __DIR__ . '/../..' . '/src/Field.php',
        'Portfolio\\Form' => __DIR__ . '/../..' . '/src/Form.php',
        'Portfolio\\Message' => __DIR__ . '/../..' . '/src/Message.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad1dba75f907023596517ce1fe335cff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad1dba75f907023596517ce1fe335cff::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitad1dba75f907023596517ce1fe335cff::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitad1dba75f907023596517ce1fe335cff::$classMap;

        }, null, ClassLoader::class);
    }
}
