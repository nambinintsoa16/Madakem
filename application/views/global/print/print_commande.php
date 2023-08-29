
	<!DOCTYPE html>
	<html>
	
	<head>
		<title></title>
	</head>
	<style>

	  .container{
          margin: auto;
          padding: 10;
          border: black solid 1px;
          width: 650px;
      }
      .container-entete{
          display: inline-block;
          width: 250px;
          text-align:left;
          padding-top: 20px!important;
      }
      td{
          height: 30px!important;
      }
      .text-copie{
          padding: 30px;
      }
      .table{
          font-size: 15px;
          width:100%;

      }
      .obs{
          height: 110px!important;
          padding-top: 2px!important;
		  text-align: top left ;
      }
      .obs span{
          height:100%;
          padding-top: 2px!important;
      }
	</style>
	<body>
<div class='container'>
    <div class='container-entete'>
	    <img src="assets/img/logoMadakem.PNG" style="width:50px"  alt='Logo'>
    </div>
	<table class="table">
	    <tr>
		 <td><label>BON DE COMMANDE DU : </label></td>
		 <td><?=$data->BC_DATE?></td>
		 <td><label>PE N° : </td>
		 <td><?=$data->BC_PE?></td>
		</tr>
		<tr>
		  <td>CLIENT,Référence : </td>
		  <td><?=$data->BC_CLIENT?></td>
		  <td>CODE : </td>
		  <td><?=$data->BC_CODE?></td>
		</tr>
		<tr>
		   <td>Date de Livraison : </td>
		   <td colspan='3'><?=$data->BC_DATELIVRE?></td>
		</tr>
		<tr>
			<td>Reassort :</td>
			<td ><?=$data->BC_REASSORT?></td>
			<td>Echantillon  :</td>
			<td><?=$data->BC_ECHANTILLON?></td>
		</tr>
		<tr>
			<td>Dimension :</td>
			<td colspan='3'><?=$data->BC_DIMENSION?></td>
		</tr>
		<tr>
			<td>Rabat  :</td>
			<td colspan='3'><?=$data->BC_RABAT?></td>
		</tr>
			<tr>
			<td>Soufflet  :</td>
			<td colspan='3'><?=$data->BC_SOUFFLET?></td>
		</tr>
		<tr>
		    <td>Perforation  :</td>
		<td colspan='3'><?=$data->BC_PERFORATION?></td>
		</tr>
		<tr>
			<td>Type  :</td>
			<td colspan='3'><?=$data->BC_TYPE?></td>
		</tr>
		<tr>
		    <td>Impression  :</td>
		    <td colspan='3'><?=$data->BC_IMPRESSION?></td>
		</tr>
		<tr>
		<td>Cylindre   :</td>
		<td colspan='3'><?=$data->BC_CYLINDRE?></td>
		</tr>
        
		<tr>
		<td>Quantité    :</td>
		<td ><?=$data->BC_QUNTITE?></td>
		<td>Prix :</td>
		<td ><?=$data->BC_PRIX?></td>
		</tr>

		<tr>
		 <td>
		   Quantité à produire en mètre:
		 </td>
		 <td colspan='3'>  
		<?=$data->BC_QUANTITEAPRODUIREENMETRE?>
		 </td>
        </tr>
		<tr>

		<td>
		  Poids d'un sachet  :
		</td>
		<td>
	<?=$data->BC_POIDSDUNSACHET?>
		</td>

		<td>
		Poids en Kgs avec marge :
	    </td>
	  <td>
	  <?=$data->BC_POISENKGSAVECMARGE?>
	  </td>
		</tr>
        <tr>
            <td colspan="4"><label>Observation</label></td>
        </tr>
        <tr>
		 <td colspan='4' style="border: solid gray 1px;" class="obs">
          <?=$data->BC_OBSERVATION?>
		 </td>
		</tr>
	
		<tr>
		<td>Dimension pour la production  : </td> 
		<td> <?=$data->BC_DIMENSIONPROD?></td> 
		<td>Nombre de rouleaux</td> 
		<td></td> 
		</tr>
		<tr>
		<td>Reçu par le Planning le </td>
		<td colspan='3'><td>
		</tr>
		<tr>
		    <td>Préparé par :</td>
			<td></td> 
			<td>Approuvé par :</td>
			<td></td>
		</tr>
        <tr><td colspan='4'></td></tr>
		<tr>
		  <td colspan='4'>
		  	<label class='w-100'> MADAKEM S.a.r.l. PK 8 RN7 Malaza Tanjombato, Antananarivo 102, Madagascar</label>
		  </td>
		</tr>
		  <td  colspan='4'>
		  <label class='w-100'>  Tél : (+261) 33 15 024 08 </label>
		  </td>	
		</tr>    	 
	</table>
</div>    
</body>
	
</html>