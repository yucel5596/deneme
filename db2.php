<?php 

ini_set('display_errors','On'); 
require("config2.php");
class Uye{
    
    protected $olusZamani = [
        'zamanDamgasi',
    ];
    public function __construct()
    {
        foreach($this->olusZamani as $zd)
        {
            $ozellik = $this->{$zd} ; 
            $this->{$zd} = new DateTime($ozellik);
        }
        
    }
    
    public function tamAd()
     {
         return $this->name ;
     }
     
     public function tarihGetir()
     {
       return $this->zamanDamgasi->format('d M Y'); 
     }
    
}

$db = new PDO('mysql:host=' . $config['db']['host'] . '; charset=utf8; dbname=' . $config['db']['vt_ad'], $config['db']['kadi'],$config['db']['sifre']);
 
$uyeler = $db->query("SELECT * FROM `names`");

$uyeler->setFetchMode(PDO::FETCH_CLASS,'Uye');



while($uye = $uyeler->fetch())
{
    echo $uye->tamAd(), '<br/>';
    echo $uye->tarihGetir(); 
}

?>