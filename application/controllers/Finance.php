
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Finance extends My_Controller
{
    public function index()
    {
    }
    public function sachet_extrussion_data()
    {
        $this->load->model("commande");
        $this->load->model("sachet_coupe");
        $this->load->model("sachet_extrusion");
        $this->load->model("sachet_impression");
        $this->load->model("global");
        $tableArray = array();
        $in = "";
        $date ="2023-06-08"; //$this->input->get('date');
        $po = $this->input->get('po');
        $type = $this->input->get('type');
    
        if ($type == "") {
            $type = "PE";
        }
        $findate = $this->input->get('fin');
        $i = 0;
      
        if ($date == "") {
          
            if ($po != "") {
                $requette = "BC_PE LIKE '%$po%'";
            } else {
                $date = date('Y-m');
                $extru = $this->global->get_data_joint_parameter('sachet_extrusion', 'commande', 'commande.BC_PE=sachet_extrusion.EX_BC_ID', "(commande.BC_ORIGINE='PLASMAD') AND  EX_DATE like '$date%'");
                foreach ($extru as $key => $extru) {
                    if (!in_array($extru->EX_BC_ID, $tableArray)) {
                        array_push($tableArray, $extru->EX_BC_ID);
                        if ($i != 0) {
                            $in .= " OR BC_PE like '$extru->EX_BC_ID'";
                        } else {
                            $in .= "BC_PE like '$extru->EX_BC_ID'";
                            $i++;
                        }
                    }
                }
                $date = date('Y-m');
                if ($in != "") {
                    $requette = "$in";
                } else {
                    $requette = "0";
                }
            }
        } else {

            if ($findate != "") {
                $extru = $this->global->get_data_joint_parameter('sachet_extrusion', 'commande', 'commande.BC_PE=sachet_extrusion.EX_BC_ID', "(commande.BC_ORIGINE='PLASMAD') AND EX_DATE  BETWEEN '$date' AND '$findate'");
            } else {
                $dateTEmp = explode("-", $date);
                $date = $dateTEmp[0] . "-" . $dateTEmp[1];
                $extru = $this->global->get_data_joint_parameter('sachet_extrusion', 'commande', 'commande.BC_PE=sachet_extrusion.EX_BC_ID', "(commande.BC_ORIGINE='PLASMAD') AND EX_DATE like '$date%'");
            }

            foreach ($extru as $key => $extru) {
                if (!in_array($extru->EX_BC_ID, $tableArray)) {
                    array_push($tableArray, $extru->EX_BC_ID);
                    if ($i != 0) {
                        $in .= " OR BC_PE like '$extru->EX_BC_ID'";
                    } else {
                        $in .= "BC_PE like '$extru->EX_BC_ID'";
                        $i++;
                    }
                }
            }
            if ($in != "") {
                $requette = "$in";
            } else {
                $requette = "0";
            }
        }
        $datas = $this->commande->select_commande_all("(" . $requette . ") ORDER BY BC_DATE ASC");
        
        $data = array();
        foreach ($datas as $row) {
          $sub_array = array();
          $sub_array[] = $row->BC_PE;
          $sub_array[] = $row->BC_DIMENSION;
          $qtt = explode(" ",$row->BC_QUNTITE);
          $sub_array[] = $row->BC_QUNTITE;
          $terminer = $this->test_valeur($this->global->get_sum_colum(["BC_PE"=>$row->BC_PE],"JO_AV", "jobcart_sachet_extrusion")->JO_AV);
          $sortie = $this->test_valeur( $this->global->get_sum_colum(["BC_PE"=>$row->BC_PE],"JO_SORTIE", "jobcart_sachet_extrusion")->JO_SORTIE);
          $sub_array[] =  $terminer;
          $sub_array[] = $sortie - $terminer;
          $livre = $this->test_valeur($this->global->get_sum_colum(["BC_ID"=>$row->BC_PE,"SF_ORIGIN"=>"Sortie livraison"],"SF_QUANTITE", "sortie_produits_finis")->SF_QUANTITE);
          $sub_array[] =  $livre ;
          $sub_array[] = $qtt[0] -  $livre;
          $data[] = $sub_array;
          
        }
        $output = array(
          "data" => $data
        );
        echo json_encode($output);
    }


    public function sachet_impression_data()
    {
        $this->load->model("commande");
        $this->load->model("sachet_coupe");
        $this->load->model("sachet_extrusion");
        $this->load->model("sachet_impression");
        $this->load->model("global");
        $tableArray = array();
        $in = "";
        $date ="2023-06-08"; //$this->input->get('date');
        $po = $this->input->get('po');
        $type = $this->input->get('type');
    
        if ($type == "") {
            $type = "PE";
        }
        $findate = $this->input->get('fin');
        $i = 0;
      
        if ($date == "") {
          
            if ($po != "") {
                $requette = "BC_PE LIKE '%$po%'";
            } else {
                $date = date('Y-m');
                $extru = $this->global->get_data_joint_parameter('sachet_extrusion', 'commande', 'commande.BC_PE=sachet_extrusion.EX_BC_ID', "(commande.BC_ORIGINE='PLASMAD') AND  EX_DATE like '$date%'");
                foreach ($extru as $key => $extru) {
                    if (!in_array($extru->EX_BC_ID, $tableArray)) {
                        array_push($tableArray, $extru->EX_BC_ID);
                        if ($i != 0) {
                            $in .= " OR BC_PE like '$extru->EX_BC_ID'";
                        } else {
                            $in .= "BC_PE like '$extru->EX_BC_ID'";
                            $i++;
                        }
                    }
                }
                $date = date('Y-m');
                if ($in != "") {
                    $requette = "$in";
                } else {
                    $requette = "0";
                }
            }
        } else {

            if ($findate != "") {
                $extru = $this->global->get_data_joint_parameter('sachet_extrusion', 'commande', 'commande.BC_PE=sachet_extrusion.EX_BC_ID', "(commande.BC_ORIGINE='PLASMAD') AND EX_DATE  BETWEEN '$date' AND '$findate'");
            } else {
                $dateTEmp = explode("-", $date);
                $date = $dateTEmp[0] . "-" . $dateTEmp[1];
                $extru = $this->global->get_data_joint_parameter('sachet_extrusion', 'commande', 'commande.BC_PE=sachet_extrusion.EX_BC_ID', "(commande.BC_ORIGINE='PLASMAD') AND EX_DATE like '$date%'");
            }

            foreach ($extru as $key => $extru) {
                if (!in_array($extru->EX_BC_ID, $tableArray)) {
                    array_push($tableArray, $extru->EX_BC_ID);
                    if ($i != 0) {
                        $in .= " OR BC_PE like '$extru->EX_BC_ID'";
                    } else {
                        $in .= "BC_PE like '$extru->EX_BC_ID'";
                        $i++;
                    }
                }
            }
            if ($in != "") {
                $requette = "$in";
            } else {
                $requette = "0";
            }
        }
        $datas = $this->commande->select_commande_all("(" . $requette . ") ORDER BY BC_DATE ASC");
        
        $data = array();
        foreach ($datas as $row) {
          $sub_array = array();
          $sub_array[] = $row->BC_PE;
          $sub_array[] = $row->BC_DIMENSION;
          $qtt = explode(" ",$row->BC_QUNTITE);
          $sub_array[] = $row->BC_QUNTITE;
          $terminer = $this->test_valeur($this->global->get_sum_colum(["BC_PE"=>$row->BC_PE],"JO_AV", "jobcart_sachet_extrusion")->JO_AV);
          $sortie = $this->test_valeur( $this->global->get_sum_colum(["BC_PE"=>$row->BC_PE],"JO_SORTIE", "jobcart_sachet_extrusion")->JO_SORTIE);
          $sub_array[] =  $terminer;
          $sub_array[] = $sortie - $terminer;
          $livre = $this->test_valeur($this->global->get_sum_colum(["BC_ID"=>$row->BC_PE,"SF_ORIGIN"=>"Sortie livraison"],"SF_QUANTITE", "sortie_produits_finis")->SF_QUANTITE);
          $sub_array[] =  $livre ;
          $sub_array[] = $qtt[0] -  $livre;
          $data[] = $sub_array;
          
        }
        $output = array(
          "data" => $data
        );
        echo json_encode($output);
    }

    public function sachet_coupe_data()
    {
        $this->load->model("commande");
        $this->load->model("sachet_coupe");
        $this->load->model("sachet_extrusion");
        $this->load->model("sachet_impression");
        $this->load->model("global");
        $tableArray = array();
        $in = "";
        $date ="2023-06-08"; //$this->input->get('date');
        $po = $this->input->get('po');
        $type = $this->input->get('type');
    
        if ($type == "") {
            $type = "PE";
        }
        $findate = $this->input->get('fin');
        $i = 0;
      
        if ($date == "") {
          
            if ($po != "") {
                $requette = "BC_PE LIKE '%$po%'";
            } else {
                $date = date('Y-m');
                $extru = $this->global->get_data_joint_parameter('sachet_extrusion', 'commande', 'commande.BC_PE=sachet_extrusion.EX_BC_ID', "(commande.BC_ORIGINE='PLASMAD') AND  EX_DATE like '$date%'");
                foreach ($extru as $key => $extru) {
                    if (!in_array($extru->EX_BC_ID, $tableArray)) {
                        array_push($tableArray, $extru->EX_BC_ID);
                        if ($i != 0) {
                            $in .= " OR BC_PE like '$extru->EX_BC_ID'";
                        } else {
                            $in .= "BC_PE like '$extru->EX_BC_ID'";
                            $i++;
                        }
                    }
                }
                $date = date('Y-m');
                if ($in != "") {
                    $requette = "$in";
                } else {
                    $requette = "0";
                }
            }
        } else {

            if ($findate != "") {
                $extru = $this->global->get_data_joint_parameter('sachet_extrusion', 'commande', 'commande.BC_PE=sachet_extrusion.EX_BC_ID', "(commande.BC_ORIGINE='PLASMAD') AND EX_DATE  BETWEEN '$date' AND '$findate'");
            } else {
                $dateTEmp = explode("-", $date);
                $date = $dateTEmp[0] . "-" . $dateTEmp[1];
                $extru = $this->global->get_data_joint_parameter('sachet_extrusion', 'commande', 'commande.BC_PE=sachet_extrusion.EX_BC_ID', "(commande.BC_ORIGINE='PLASMAD') AND EX_DATE like '$date%'");
            }

            foreach ($extru as $key => $extru) {
                if (!in_array($extru->EX_BC_ID, $tableArray)) {
                    array_push($tableArray, $extru->EX_BC_ID);
                    if ($i != 0) {
                        $in .= " OR BC_PE like '$extru->EX_BC_ID'";
                    } else {
                        $in .= "BC_PE like '$extru->EX_BC_ID'";
                        $i++;
                    }
                }
            }
            if ($in != "") {
                $requette = "$in";
            } else {
                $requette = "0";
            }
        }
        $datas = $this->commande->select_commande_all("(" . $requette . ") ORDER BY BC_DATE ASC");
        
        $data = array();
        foreach ($datas as $row) {
          $sub_array = array();
          $sub_array[] = $row->BC_PE;
          $sub_array[] = $row->BC_DIMENSION;
          $qtt = explode(" ",$row->BC_QUNTITE);
          $sub_array[] = $row->BC_QUNTITE;
          $terminer = $this->test_valeur($this->global->get_sum_colum(["BC_PE"=>$row->BC_PE],"JO_AV", "jobcart_sachet_extrusion")->JO_AV);
          $sortie = $this->test_valeur( $this->global->get_sum_colum(["BC_PE"=>$row->BC_PE],"JO_SORTIE", "jobcart_sachet_extrusion")->JO_SORTIE);
          $sub_array[] =  $terminer;
          $sub_array[] = $sortie - $terminer;
          $livre = $this->test_valeur($this->global->get_sum_colum(["BC_ID"=>$row->BC_PE,"SF_ORIGIN"=>"Sortie livraison"],"SF_QUANTITE", "sortie_produits_finis")->SF_QUANTITE);
          $sub_array[] =  $livre ;
          $sub_array[] = $qtt[0] -  $livre;
          $data[] = $sub_array;
          
        }
        $output = array(
          "data" => $data
        );
        echo json_encode($output);
    }
    public function Sachet_extrusion()
    {
        $this->render_view('finance/production/Sachet_extrusion');
    }
    public function Sachet_impression()
    {
        $this->render_view('finance/production/Sachet_impression');
    }
    public function Sachet_coupe()
    {
        $this->render_view('finance/production/Sachet_coupe');
    }

    function test_valeur($valeur)
    {
        return  $valeur == null ? 0 : $valeur;
    }

}
