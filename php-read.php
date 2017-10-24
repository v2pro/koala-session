<?php

require_once "gen-php/koala/recorded/Types.php";
require_once "gen-php/Thrift/Exception/TException.php";
require_once "gen-php/Thrift/Exception/TTransportException.php";
require_once "gen-php/Thrift/Transport/TTransport.php";
require_once "gen-php/Thrift/Transport/TMemoryBuffer.php";
require_once "gen-php/Thrift/Transport/TFramedTransport.php";
require_once "gen-php/Thrift/Protocol/TProtocol.php";
require_once "gen-php/Thrift/Protocol/TBinaryProtocol.php";
require_once "gen-php/Thrift/Type/TType.php";
require_once "gen-php/Thrift/Factory/TStringFuncFactory.php";
require_once "gen-php/Thrift/StringFunc/TStringFunc.php";
require_once "gen-php/Thrift/StringFunc/Core.php";

$input = fgets(STDIN);
$buf = new \Thrift\Transport\TMemoryBuffer(hex2bin(trim($input)));
$protocol = new \Thrift\Protocol\TBinaryProtocol($buf);
$session = new \koala\recorded\Session();
$session->read($protocol);
var_dump($session);