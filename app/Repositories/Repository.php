<?php
namespace App\Repositories;
use Exception;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Support\Facades\Hash;

class Repository
{
//-------------------------------CREATION-DE-BASE-DE-DONNEES-------------------------------
//commentaire lyes
// la méthode createDatabase exécute le script
// build.sql en étant connectée à la base de données de l'application.
function tableEtudiant($email): array
{
    $tableEtudiant = DB::table('Etudiant')->where('Email_Etudiant', $email)->get()->toArray();
    if(count($tableEtudiant)===0){
        throw new Exception('Utilisateur inconnu');
    }
    return $tableEtudiant;
}
//-------------------------------------------------------------------------------
function getIdEtudiantByRdv($IdRdv): int {
    $tableEtudiant = DB::table('RendezVous')->where('Id_RDV', $IdRdv)->get('IdEtudiant')->toArray();
    if(count($tableEtudiant)===0){
        throw new Exception('Utilisateur inconnu');
    }
    $tableEtudiant= json_decode(json_encode($tableEtudiant), true);

    

   return (intval($tableEtudiant[0]['IdEtudiant']));
}
//----------------------------------------------------------------------------------------
function tableEtudiantById($IdEtudiant): array
{
    $tableEtudiant = DB::table('Etudiant')->where('IdEtudiant', $IdEtudiant)->get()->toArray();
    if(count($tableEtudiant)===0){
        throw new Exception('Utilisateur inconnu');
    }
    return $tableEtudiant;
}
//---------------------------------------------------------------------------------------------
function tableEnseignant($email): array
{
    $tableEnseignant = DB::table('Enseignant')->where('Email_Enseignant', $email)->get()->toArray();
    if(count($tableEnseignant)===0){
        throw new Exception('Utilisateur inconnu');
    }
    $tableEnseignant = json_decode(json_encode($tableEnseignant), true);
    return $tableEnseignant;
}
//----------------------------------------------------------------------------------------------
function tableUtilisateurEtudiant($email): array
{
    return DB::table('UtilisateurEtudiant')->where('Email_Etudiant', $email)->get()->toArray();
}
//---------------------------------------------------------------------------------------------
function changeCodeConfirmation($email,$code):void
{
    DB::table('UtilisateurEtudiant')
    ->where('Email_Etudiant', $email)
    ->update(['codeReinitialisation'=> $code]);
}
function changeMotDePasseOublier($email,$Mot_Passe_Hashé):void
{
    $code = rand(100000,999999);
    DB::table('UtilisateurEtudiant')
    ->where('Email_Etudiant', $email)
    ->update(['Mot_Passe_Hashé'=>Hash::make($Mot_Passe_Hashé),'codeReinitialisation'=> $code]);
}
function createDatabase(): void
{
    DB::unprepared(file_get_contents('database/build.sql'));
    DB::unprepared(file_get_contents('database/build2.sql'));
   // La méthode unprepared exécute le script qui lui est donné en argument.
   // La fonction PHP file_get_contents prend en argument un nom de fichier
}
function getTableUser($email): array{
    return DB::table('Etudiant')->where('Email_Etudiant', $email)->get()->toArray();
}
function etudiantExiste($email): bool
{
    $table = $this->getTableUser($email);
    if(count($table)!==0)
        return true;
    return false;
}

function modifInfoEtudiant(string $email,string $email2,string $nomEtudiant,
                            string $PrénomEtudiant,string $Date_Naissance, string $NumTelephone)
{
    //dd($Date_Naissance);
    $table = $this->getTableUser($email);
    //dd($table[0]->Email_Etudiant);

    if(count($table)!==0){
        DB::table('Etudiant')
            ->where('Email_Etudiant', $email)
            ->update([  'NomEtudiant'=> $nomEtudiant,
                        'PrénomEtudiant'=> $PrénomEtudiant,
                        'Date_Naissance'=> $Date_Naissance,
                        'Email_Etudiant'=> $email2,
                        'NumTelephone'=> $NumTelephone

                    ]);
    }else{
        throw new Exception('Modifications échouées');
    }

    }
    function insertEtudiant(array $Etudiant): int
    {
        //throw new Exception("bonjour bonjour");
       // DB::table('teams')->insert($team);
       //yfcygfgfygtfytf
        $id = DB::table('Etudiant')->insertGetId($Etudiant);

        return $id;
    }
    function addUser(string $email, string $password): int
    {
      $passwordHash= Hash::make($password);

      return DB::table('UtilisateurEtudiant')->insertGetId(['Email_Etudiant'=>$email,'Mot_Passe_Hashé'=>$passwordHash]);

    }

    function getStudent(string $email, string $password): array
    {
    // TODO
    $users=DB::table('UtilisateurEtudiant')->where('Email_Etudiant',$email)->get()->toArray();
    if(count($users)==0 ){
        throw new Exception('Utilisateur inconnu');
    }
    $user=$users[0];
    $ok = Hash::check($password, $user->Mot_Passe_Hashé);
    //dd($ok);
    //dump($ok);
    if(!$ok)
    {
        throw new Exception('Utilisateur inconnu');
    }
        return [$user->Id,$user->Email_Etudiant];
    }



    function insertEnseignant(array $Enseignant): int
    {
        //throw new Exception("bonjour bonjour");
       // DB::table('teams')->insert($team);
       //yfcygfgfygtfytf
        $id = DB::table('Enseignant')->insertGetId($Enseignant);
        return $id;

    }
    function addTeacher(string $email, string $password): int
    {
      $passwordHash= Hash::make($password);

      return DB::table('UtilisateurEnseignant')->insertGetId(['Email_Enseignant'=>$email,'Mot_Passe_Hashé'=>$passwordHash]);

    }

    function getTeacher(string $email, string $password): array
    {
        // TODO
        $users=DB::table('UtilisateurEnseignant')->where('Email_Enseignant',$email)->get()->toArray();
        if(count($users)==0)
            {
                throw new Exception('Utilisateur inconnu');
            }
        $user=$users[0];
        $ok = Hash::check($password, $user->Mot_Passe_Hashé);
        //dd($ok);
        //dump($ok);
        if(!$ok)
            {
                throw new Exception('Utilisateur inconnu');
            }

        return [$user->Id,$user->Email_Enseignant];

    }

    function searchProf(string $q): array
    {

      return  DB::table('Enseignant')
      ->where('NomEnseignant', 'like', "%$q%")
      ->orWhere('PrénomEnseignant', 'like', "%$q%")
      ->get()
      ->toArray();
    }

     function searchEtud(string $q): array
     {
       return  DB::table('Etudiant')
       ->where('NomEtudiant', 'like', "%$q%")
       ->orWhere('PrénomEtudiant', 'like', "%$q%")
       ->get()
       ->toArray();
    }
function remplissageBD(): void{
    for($j = 1 ; $j<=5 ; $j++)
    {
            for($i = 1 ; $i<=9 ; $i++)
            {
                if($j==1) $jour = 'Lundi';
                if($j==2) $jour = 'Mardi';
                if($j==3) $jour = 'Mercredi';
                if($j==4) $jour = 'Jeudi';
                if($j==5) $jour = 'Vendredi';
                DB::table('DispNouioua')->insert(['Heure'=>$i,'Etat'=>'non','jour'=>$jour]);
                DB::table('DispEstellon')->insert(['Heure'=>$i,'Etat'=>'non','jour'=>$jour]);
                DB::table('DispDinaz')->insert(['Heure'=>$i,'Etat'=>'non','jour'=>$jour]);
                DB::table('DispCreignou')->insert(['Heure'=>$i,'Etat'=>'non','jour'=>$jour]);
            }
    }

                }

            function insertHeur()
            {
                $tab = [['1000'],['1030'],['1100'],['1130'],['1200'],['1230'],['1400'],['1430'],['1500']];
                $tabjous = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi'];
                $tabj=['L','Ma','Me','J','V'];
                $j=0;
                for($k = 1 ; $k<=5 ; $k++){
                for($i = 0 ; $i<9 ; $i++){
                    // if($j==4) $j=0;
                    // dump($tab[$i][0]);
                    DB::table('DispNouioua')
                    ->where('Heure',($i+1))
                    ->where('Jour',$tabjous[$j])
                    ->update(['Heure'=>$tabj[$j].$tab[$i][0]]);

                    DB::table('DispEstellon')
                    ->where('Heure',($i+1))
                    ->where('Jour',$tabjous[$j])
                    ->update(['Heure'=>$tabj[$j].$tab[$i][0]]);

                    DB::table('DispDinaz')
                    ->where('Heure',($i+1))
                    ->where('Jour',$tabjous[$j])
                    ->update(['Heure'=>$tabj[$j].$tab[$i][0]]);

                    DB::table('DispCreignou')
                    ->where('Heure',($i+1))
                    ->where('Jour',$tabjous[$j])
                    ->update(['Heure'=>$tabj[$j].$tab[$i][0]]);
                }
                    $j++;
                }

            }

            function tabDispoEnseignant($email): array
            {
                //$value = DB::table('Enseignant')->where('Id_Enseignant',2)->get('Email_Enseignant');
                //dd($value[0]->Email_Enseignant);
                if($email == (DB::table('Enseignant')->where('Id_Enseignant',1)->get('Email_Enseignant'))[0]->Email_Enseignant)
                    return DB::table('DispNouioua')->get()->toArray();

                if($email == (DB::table('Enseignant')->where('Id_Enseignant',2)->get('Email_Enseignant'))[0]->Email_Enseignant)
                    return DB::table('DispEstellon')->get()->toArray();

                if($email == (DB::table('Enseignant')->where('Id_Enseignant',3)->get('Email_Enseignant'))[0]->Email_Enseignant)
                    return DB::table('DispDinaz')->get()->toArray();

                if($email == (DB::table('Enseignant')->where('Id_Enseignant',4)->get('Email_Enseignant'))[0]->Email_Enseignant)
                    return DB::table('DispCreignou')->get()->toArray();
            }


            function modificationDispo($email, $tab): void
            {
                if($email == (DB::table('Enseignant')->where('Id_Enseignant',1)->get('Email_Enseignant'))[0]->Email_Enseignant)
                  {
                      foreach($tab as $val)
                      {
                         // dd($val);
                          DB::table('DispNouioua')
                          ->where('Heure',$val)
                          ->update(['Etat'=>'oui']);
                      }
                  }


                if($email == (DB::table('Enseignant')->where('Id_Enseignant',2)->get('Email_Enseignant'))[0]->Email_Enseignant)
                {
                    foreach($tab as $val)
                    {
                        DB::table('DispEstellon')
                        ->where('Heure',$val)
                        ->update(['Etat'=>'oui']);
                    }
                }

                if($email == (DB::table('Enseignant')->where('Id_Enseignant',3)->get('Email_Enseignant'))[0]->Email_Enseignant)
                {
                    foreach($tab as $val)
                    {
                        DB::table('DispDinaz')
                        ->where('Heure',$val)
                        ->update(['Etat'=>'oui']);
                    }
                }

                if($email == (DB::table('Enseignant')->where('Id_Enseignant',4)->get('Email_Enseignant'))[0]->Email_Enseignant)
                {
                    foreach($tab as $val)
                    {
                        DB::table('DispCreignou')
                        ->where('Heure',$val)
                        ->update(['Etat'=>'oui']);
                    }
                }
            }

            function sendMessage(String $message, int $IdEtudiant , int $IdEnseignant): int
            {
                return DB::table('Message')->insertGetId(['Message'=>$message,'Id_Enseignant'=>$IdEnseignant,'IdEtudiant'=>$IdEtudiant]);
            }

            function msg_count(int $IdEtudiant): int
            {
                return count(DB::table('Message')->where('IdEtudiant',$IdEtudiant)->get()->toArray());
            }


            function getMessage( int $IdEtudiant): array
            {
                return DB::table('Message')->where('IdEtudiant',$IdEtudiant)->get('Message')->toArray();
            }
            function getMessage2( int $Id_msg): array
            {
                return DB::table('Message')->where('Id_msg',$Id_msg)->get('Message')->toArray();
            }
            function getMessageIdtech( int $IdEtudiant):array
            {
                return DB::table('Message')->where('IdEtudiant',$IdEtudiant)->get(['Id_Enseignant'])->toArray();
            }

            function getMessageIdtechName(int $Id_Enseignant):array
            {
            return DB::table('Enseignant')
                    ->where('Id_Enseignant',$Id_Enseignant)
                    ->get(['Id_Enseignant','NomEnseignant', 'PrénomEnseignant','Matière'])
                    ->toArray();
            }

            function getMessageIdtechNames(int $IdEtudiant):array
            {
                $Ids=$this->getMessageIdtech($IdEtudiant);
                // dd($Ids);
                foreach($Ids as $Id){
                    $Names[] = $this->getMessageIdtechName($Id->Id_Enseignant);
                }
                $idmsg = DB::table('Message')->where('IdEtudiant',$IdEtudiant)->get(['Id_msg'])->toArray();
                $idms=json_decode(json_encode($idmsg), true);
                $Nam=json_decode(json_encode($Names), true);
                // dump($Nam);
                //  dump($idms);
                // dd('fin');

                // dd($Nam);
                // dd($idms);


                for($i=0; $i< $this->msg_count($IdEtudiant) ;$i++)
                {
                    $Nam[$i][0]=$Nam[$i][0]+$idms[$i];

                }
                // dump($Nam);
                // dd('fin');
                $Names=$Nam;
                return $Names;
            }

            function envoiFichier(string $Heure,string $Message,string $objet, int $IdEtudiant, int $Id_Enseignant)
            {
                $chaineAleatoire = $this->genererChaineAleatoire(30);
                //dump($_FILES);
                $nomFichier = $_FILES['fichier']['name'];
                //dump($nomFichier);
                $extentionFichier = strrchr($nomFichier,('.'));
                if($extentionFichier!=false)
                {
                    $extensionsAutorises = array('.pdf','.PDF','.docx','.docx','.txt','.TXT','.jpg');
                    $nomFichierTmp = $_FILES['fichier']['tmp_name'];
                    //dd($nomFichierTmp);
                    $nomFichierHache = $chaineAleatoire.$nomFichier ;
                    //dump($nomFichier);
                    //dd($nomFichierHache);
                    $fichierDestination = 'C:\Users\hp\OneDrive\Bureau\25-03-21-00..56\contact\public\storage\image\fichiers/'.$nomFichierHache;
                    //dd($nomFichierHache); C:\Users\walid\OneDrive\CCI\CCC\walid\public\storage\image\imagesDefault.png
                    //C:\Users\hp\OneDrive\Bureau\25-03-21-00..56\contact
                    if(in_array($extentionFichier,$extensionsAutorises))
                    {
                        if(move_uploaded_file($nomFichierTmp,$fichierDestination))
                        {
                            DB::table('RendezVous') ->insert(['Heure'=>$Heure,
                                                            'Message'=>$Message,
                                                            'objet'=>$objet,
                                                            'IdEtudiant'=>$IdEtudiant,
                                                            'Id_Enseignant'=>$Id_Enseignant,
                                                            'nomFichier'=>$nomFichier,
                                                            'nomFichierHache'=>$nomFichierHache]);
                        }
                        else
                        {
                            throw new Exception('Fichier non envoyer verifiez la fonction mouve dasn repository');
                        }
                    } else
                    {
                        throw new Exception('Extension du fichier non autorisée');
                    }
                }
                else
                {
                    DB::table('RendezVous') ->insert([  'Heure'=>$Heure,
                                                        'Message'=>$Message,
                                                        'objet'=>$objet,
                                                        'IdEtudiant'=>$IdEtudiant,
                                                        'Id_Enseignant'=>$Id_Enseignant]);
                }

            }
            function verificationExtensionImage(string $fileName):bool
            {
                $extentionImage = strrchr($fileName,('.'));
                $extensionsAutorises = array('.png','.PNG','.jpg','.JPG','.jpeg','.GPEG','.jfif','JFIF');
                if(in_array($extentionImage,$extensionsAutorises)) return true;
                else 
                {
                    throw new Exception('Extension de photos autorisée => (png,PNG,jpg,JPG,jpeg,GPEG) uniquement');
                }
            }
            function envoiPhoto(string $nomFichierTmp, string $fichierDestination):bool
            {
                return move_uploaded_file($nomFichierTmp,$fichierDestination);
            }

            function genererChaineAleatoire($longueur = 10)
            {
                $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $longueurMax = strlen($caracteres);
                $chaineAleatoire = '';
                for ($i = 0; $i < $longueur; $i++)
                    {
                    $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
                    }
                return $chaineAleatoire;
            }

            function modificationDispoParEtudiant($email, $Heure): void
            {
                if($email == (DB::table('Enseignant')->where('Id_Enseignant',1)->get('Email_Enseignant'))[0]->Email_Enseignant)
                  {
                        DB::table('DispNouioua')
                        ->where('Heure',$Heure)
                        ->update(['Etat'=>'non']);
                  }


                if($email == (DB::table('Enseignant')->where('Id_Enseignant',2)->get('Email_Enseignant'))[0]->Email_Enseignant)
                {
                    DB::table('DispEstellon')
                    ->where('Heure',$Heure)
                    ->update(['Etat'=>'non']);
                }
                if($email == (DB::table('Enseignant')->where('Id_Enseignant',3)->get('Email_Enseignant'))[0]->Email_Enseignant)
                {
                    DB::table('DispDinaz')
                    ->where('Heure',$Heure)
                    ->update(['Etat'=>'non']);
                }

                if($email == (DB::table('Enseignant')->where('Id_Enseignant',4)->get('Email_Enseignant'))[0]->Email_Enseignant)
                {
                    DB::table('DispCreignou')
                    ->where('Heure',$Heure)
                    ->update(['Etat'=>'non']);
                }
            }
            function nonFichier():array
            {
                $tab = DB::table('RendezVous')->get('nomFichierHache')->toArray();
                $taille = count($tab);

                return DB::table('RendezVous')->where('Id_RDV',$taille)
                ->get('nomFichierHache')->toArray();
            }

            function getRendezvous( int $IdEtudiant):array
            {
                return DB::table('RendezVous')
                ->where('IdEtudiant',$IdEtudiant)
                ->get(['Id_RDV','Heure','Message','objet','IdEtudiant','Id_Enseignant','nomFichier','nomFichierHache'])
                ->toArray();
            }
            function msg_rdv(int $IdEtudiant): int
            {
                return count(DB::table('RendezVous')->where('IdEtudiant',$IdEtudiant)->get()->toArray());
            }

            function getIdtech( int $IdEtudiant):array
            {
                return DB::table('RendezVous')->where('IdEtudiant',$IdEtudiant)->get(['Id_Enseignant'])->toArray();
            }
            function getIdtechName(int $Id_Enseignant):array
            {
            return DB::table('Enseignant')
                    ->where('Id_Enseignant',$Id_Enseignant)
                    ->get(['Id_Enseignant','NomEnseignant', 'PrénomEnseignant','Matière'])
                    ->toArray();
            }



            function getIdtechNames(int $IdEtudiant):array
            {
                $Ids=$this->getIdtech($IdEtudiant);
                foreach($Ids as $Id){
                    $Names[] = $this->getIdtechName($Id->Id_Enseignant);
                }
                $irdv = DB::table('RendezVous')->where('IdEtudiant',$IdEtudiant)->get(['Id_RDV'])->toArray();
                $irdv=json_decode(json_encode($irdv), true);
                $Nam=json_decode(json_encode($Names), true);
                // dump($Nam);
                //  dump($idms);


                // dd($Nam);
                // dd($idms);


                for($i=0; $i< $this->msg_rdv($IdEtudiant) ;$i++)
                {
                    $Nam[$i][0]=$Nam[$i][0]+$irdv[$i];

                }
                // dump($Nam);
                // dd('fin');
                for($i=0; $i< $this->msg_rdv($IdEtudiant) ;$i++)
                {
                    $Nam[$i]=$Nam[$i][0]+$irdv[$i];

                }
                $Names=$Nam;
                return $Names;//les info des profs + idrdv
            }

            function getJour(string $Heur):string
            {
                $lundi = array('L1000','L1030','L1100','L1130','L1200','L1230','L1400','L1430','L1500');
                $mardi = array('Ma1000','Ma1030','Ma1100','Ma1130','Ma1200','Ma1230','Ma1400','Ma1430','Ma1500');
                $mercredi = array('Me1000','Me1030','Me1100','Me1130','Me1200','Me1230','Me1400','Me1430','Me1500');
                $jeudi = array('J1000','J1030','J1100','J1130','J1200','J1230','J1400','J1430','J1500');
                $vendredi = array('V1000','V1030','V1100','V1130','V1200','V1230','V1400','V1430','V1500');

                if(in_array($Heur,$lundi)) return "Lundi";
                if(in_array($Heur,$mardi)) return "Mardi";
                if(in_array($Heur,$mercredi)) return "mercredi";
                if(in_array($Heur,$jeudi)) return "Jeudi";
                if(in_array($Heur,$vendredi)) return "Vendredi";
                throw new Exception('Heure incorecte');
            }
            function gethh(string $Heur):string
            {

                $rest = substr_replace(substr($Heur, -4), ':', 2, 0);

                return $rest;
            }

            function getget(int  $Id_RDV):string
            {
                $heur=json_decode(json_encode(DB::table('RendezVous')
                ->where('Id_RDV',$Id_RDV)
                ->get(['Heure'])
                ->toArray()), true);
                return $heur[0]['Heure'];
            }

            function getheur( int $IdEtudiant):array
            {
                $ids=json_decode(json_encode( DB::table('RendezVous')
                ->where('IdEtudiant',$IdEtudiant)
                ->get(['Id_RDV'])
                ->toArray() ), true);

                foreach($ids as $id){
                    $jj[]=$this->getget($id['Id_RDV']);
                }
                for($i=0; $i < $this->msg_rdv($IdEtudiant) ;$i++){
                    $jj[$i]=$this->getJour($jj[$i]);
                    $jjj[$i]['Jour']= $jj[$i];
                }
                return $jjj;
            }

            function getheur2( int $IdEtudiant):array
            {
                $ids=json_decode(json_encode( DB::table('RendezVous')
                ->where('IdEtudiant',$IdEtudiant)
                ->get(['Id_RDV'])
                ->toArray() ), true);

                foreach($ids as $id){
                    $jj[]=$this->getget($id['Id_RDV']);
                }
                for($i=0; $i < $this->msg_rdv($IdEtudiant) ;$i++){
                    $jj[$i]=$this->gethh($jj[$i]);
                    $jjj[$i]['Heure']= $jj[$i];
                }
                return $jjj;
            }


            function info(int $IdEtudiant):array
            {
                $info=$this->getIdtechNames($IdEtudiant);
                $heur=$this->getheur2($IdEtudiant);
                $jour=$this->getheur($IdEtudiant);


                for($i=0; $i < $this->msg_rdv($IdEtudiant) ;$i++){
                    $infos[$i]=$info[$i]+$jour[$i]+$heur[$i];
                }
                return $infos;
            }

//----------------------------------------------------------------------
function getRendezvoustech( int $Id_Enseignant):array
            {
                return DB::table('RendezVous')
                ->where('Id_Enseignant',$Id_Enseignant)
                ->get(['Id_RDV','Heure','Message','objet','IdEtudiant','Id_Enseignant','nomFichier','nomFichierHache'])
                ->toArray();
            }
            function msg_rdv2(int $Id_Enseignant): int
            {
                return count(DB::table('RendezVous')->where('Id_Enseignant',$Id_Enseignant)->get()->toArray());
            }

            function getIdtestd( int $Id_Enseignant):array
            {
                return DB::table('RendezVous')->where('Id_Enseignant',$Id_Enseignant)->get(['IdEtudiant'])->toArray();
            }
            function getIdstdName(int $IdEtudiant):array
            {
            return DB::table('Etudiant')
                    ->where('IdEtudiant',$IdEtudiant)
                    ->get(['IdEtudiant','NomEtudiant', 'PrénomEtudiant','Niveau_Etude'])
                    ->toArray();
            }



            function getIdstdNames(int $Id_Enseignant):array
            {
                $Ids=$this->getIdtestd($Id_Enseignant);

// dd($Ids);

                foreach($Ids as $Id){
                    $Names[] = $this->getIdstdName($Id->IdEtudiant);
                }

                // dd(count($Names));
                $irdv = DB::table('RendezVous')->where('Id_Enseignant',$Id_Enseignant)->get(['Id_RDV'])->toArray();
                $irdv=json_decode(json_encode($irdv), true);
                $Nam=json_decode(json_encode($Names), true);
                // dump($Nam);
                //  dump($idms);

                // dd($Nam);
                // dd($idms);

                for($i=0; $i< $this->msg_rdv2($Id_Enseignant) ;$i++)
                {
                    $Nam[$i][0]=$Nam[$i][0]+$irdv[$i];
                }
                // dump($Nam);
                // dd('fin');
                for($i=0; $i< $this->msg_rdv2($Id_Enseignant) ;$i++)
                {
                    $Nam[$i]=$Nam[$i][0]+$irdv[$i];

                }
                $Names=$Nam;
                return $Names;
            }

            function getJour2(string $Heur):string
            {
                $lundi = array('L1000','L1030','L1100','L1130','L1200','L1230','L1400','L1430','L1500');
                $mardi = array('Ma1000','Ma1030','Ma1100','Ma1130','Ma1200','Ma1230','Ma1400','Ma1430','Ma1500');
                $mercredi = array('Me1000','Me1030','Me1100','Me1130','Me1200','Me1230','Me1400','Me1430','Me1500');
                $jeudi = array('J1000','J1030','J1100','J1130','J1200','J1230','J1400','J1430','J1500');
                $vendredi = array('V1000','V1030','V1100','V1130','V1200','V1230','V1400','V1430','V1500');

                if(in_array($Heur,$lundi)) return "Lundi";
                if(in_array($Heur,$mardi)) return "Mardi";
                if(in_array($Heur,$mercredi)) return "mercredi";
                if(in_array($Heur,$jeudi)) return "Jeudi";
                if(in_array($Heur,$vendredi)) return "Vendredi";
                throw new Exception('Heure incorecte');
            }
            function gethh2(string $Heur):string
            {

                $rest = substr_replace(substr($Heur, -4), ':', 2, 0);

                return $rest;
            }

            function getget2(int  $Id_RDV):string
            {
                $heur=json_decode(json_encode(DB::table('RendezVous')
                ->where('Id_RDV',$Id_RDV)
                ->get(['Heure'])
                ->toArray()), true);
                return $heur[0]['Heure'];
            }

            function getheur22(int $Id_Enseignant):array
            {
                $ids=json_decode(json_encode( DB::table('RendezVous')
                ->where('Id_Enseignant',$Id_Enseignant)
                ->get(['Id_RDV'])
                ->toArray() ), true);

                foreach($ids as $id){
                    $jj[]=$this->getget2($id['Id_RDV']);
                }

                for($i=0; $i < $this->msg_rdv2($Id_Enseignant) ;$i++){
                    $jj[$i]=$this->getJour2($jj[$i]);
                    $jjj[$i]['Jour']= $jj[$i];
                }
                return $jjj;
            }

            function getheur222( int $Id_Enseignant):array
            {
                $ids=json_decode(json_encode( DB::table('RendezVous')
                ->where('Id_Enseignant',$Id_Enseignant)
                ->get(['Id_RDV'])
                ->toArray() ), true);

                foreach($ids as $id){
                    $jj[]=$this->getget2($id['Id_RDV']);
                }
                for($i=0; $i < $this->msg_rdv2($Id_Enseignant) ;$i++){
                    $jj[$i]=$this->gethh2($jj[$i]);
                    $jjj[$i]['Heure']= $jj[$i];
                }
                return $jjj;
            }


            function info2(int $Id_Enseignant):array
            {
                $info=$this->getIdstdNames($Id_Enseignant);
                $heur=$this->getheur222($Id_Enseignant);
                $jour=$this->getheur22($Id_Enseignant);

                for($i=0; $i < $this->msg_rdv2($Id_Enseignant) ;$i++){
                    $infos[$i]=$info[$i]+$jour[$i]+$heur[$i];
                }

                return $infos;
            }


            function getobj(int $Id_RDV):array
            {
                return DB::table('RendezVous')
                ->where('Id_RDV',$Id_RDV)
                ->get(['objet'])
                ->toArray();
            }

            function getmmj(int $Id_RDV):array
            {
                return DB::table('RendezVous')
                ->where('Id_RDV',$Id_RDV)
                ->get(['Message'])
                ->toArray();
            }
            function getdoc(int $Id_RDV):array
            {
                return DB::table('RendezVous')
                ->where('Id_RDV',$Id_RDV)
                ->get(['nomFichierHache'])
                ->toArray();
            }




}




