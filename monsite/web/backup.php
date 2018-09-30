<?php



/**
 * Description of backup
 *
 * @author frederic dupont
 */
class Backup {
   public function backupSql(){
$serveur          = "nom_serveur";
$utilisateur      = "nom_user";
$motDePasse       = "mdp";
$base             = "nom_BDD"; 
$dir_backup       = getenv('DOCUMENT_ROOT')."/Backup";
 
MYSQL_CONNECT($serveur, $utilisateur, $motDePasse) or die ( "<h1>Serveur MySQL non disponible</h1>");
MYSQL_SELECT_DB($base) or die ( "<h1>Base non disponible</h1>");
 
// Génération du fichier de sauvegarde dans le répertoire <em>$dir_backup</em>
  system(sprintf(
    'mysqldump --opt -h%s -u%s -p"%s" %s | gzip > %s/SauveBD_'.date("d_n_Y_H_i_s").'.sql.gz',
    $serveur,
    $utilisateur,
    $motDePasse,
    $base,
    $dir_backup
  ));
 
$NbJours = 7;
// Suppression des vieux fichiers de sauvegarde 
   $folder = new DirectoryIterator($dir_backup);
    foreach($folder as $file){ 
       if( ($file->isFile()) && (!$file->isDot()) ) {
          if (time() - $file->getMTime() > $NbJours*24*3600) unlink($file->getPathname());   
       }
    }
   }
}
