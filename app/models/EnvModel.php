<?php
class EnvModel
{
  public function getEnvValue($envVariable)
  {
    $envFilePath = ROOT . ROOTPATH . '/.env';
    $envVariables = parse_ini_file($envFilePath);
    return $envVariables[$envVariable] ?? null;
  }
}
