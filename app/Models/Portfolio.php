<?php

namespace Projet\Models;

class PortfolioModel extends TempsDaimeOrm
{
    $bdd = $this->connect();
    $req = $bdd->query("");
}