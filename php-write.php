<?php

require_once "gen-php/koala/recorded/Types.php";
require_once "gen-php/Thrift/Transport/TTransport.php";
require_once "gen-php/Thrift/Transport/TMemoryBuffer.php";
require_once "gen-php/Thrift/Transport/TFramedTransport.php";
require_once "gen-php/Thrift/Protocol/TProtocol.php";
require_once "gen-php/Thrift/Protocol/TBinaryProtocol.php";
require_once "gen-php/Thrift/Type/TType.php";
require_once "gen-php/Thrift/Factory/TStringFuncFactory.php";
require_once "gen-php/Thrift/StringFunc/TStringFunc.php";
require_once "gen-php/Thrift/StringFunc/Core.php";

$buf = new \Thrift\Transport\TMemoryBuffer();
$protocol = new \Thrift\Protocol\TBinaryProtocol($buf);
$session = new \koala\recorded\Session();
$session->SessionId = "session-id";
$returnInbound = new \koala\recorded\ReturnInbound();
$returnInbound->Base = new \koala\recorded\BaseAction();
$returnInbound->Base->ActionType = "ReturnInbound";
$returnInbound->Base->OccurredAt = intval(microtime());
$returnInbound->Base->ActionIndex = 2;
$returnInbound->Response = "hello";
$action = new \koala\recorded\Action();
$action->ReturnInBound = $returnInbound;
$session->Actions []= $action;
$session->write($protocol);
$buf->flush();
echo bin2hex($buf->getBuffer());
echo "\n";