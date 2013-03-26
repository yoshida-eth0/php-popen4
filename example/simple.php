<?php

require_once(dirname(__file__).'/../lib/POpen4.php');

$p = new POpen4("/bin/bash");

fwrite($p->stdin(), "echo 42.out\n");
fwrite($p->stdin(), "echo 42.err 1>&2\n");

$out = fread($p->stdout(), 1024);
$err = fread($p->stderr(), 1024);

$p->close();

echo "pid        : ".$p->pid()."\n";
echo "stdout     : ".trim($out)."\n";
echo "stderr     : ".trim($err)."\n";
echo "status     : ".trim(print_r($p->status(), true))."\n";
echo "exitstatus : ".$p->exitstatus()."\n";
