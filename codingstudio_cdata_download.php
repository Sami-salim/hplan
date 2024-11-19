<?php
include_once('dbdb.php');
include "db_conn.php";  

header('content-type:application/vnd-ms-excel');
$filename="codingstudio_data.xls";
header("content-Disposition:attachment;filename=\"$filename\"");

?>
<form action="" method="post">
  
  <table width="100%" class="table table-striped tablevk" >
    <thead>
     <tr>
     <th width="2%" align="center">Sl No</th>  
        <th width="20%" align="center">Indicatore</th>
         <th width="10%" align="center">unit</th>
      
          <th width="8%" align="center">yearly plan</th>
          <th width="10%" align="center">Quarter one</th>
          <th width="10%" align="center">Quarterone_report</th>
          <th width="15%" align="center">Quarterone_achiv</th>
          <th width="15%" align="center">year</th>
        <th width="30%" align="center">
    
      </th>
      </tr>
    </thead>
    <tbody>
      <?php
  
  $i=1;   
  $sql2="SELECT * FROM `yearly_planc` order by id DESC";
  foreach($dbConnection->query($sql2, PDO::FETCH_ASSOC) as $row)
  {
    ?>
      <tr>
      <td width="5%" align="left"><?php echo $i++;?></td>
      <td width="20%" align="left"><?php echo $row['indicator'];?></td>
      <td width="10%" align="left"><a href="<?php echo $row['unit'];?>"><?php echo $row['unit'];?></a></td>
      <td width="10%" align="left"><?php echo $row['yeariyplan'];?></td>
      <td width="10%" align="left"><?php echo $row['quarterone'];?></td>
      <td width="10%" align="left"><?php echo $row['quarterone_report'];?></td>
      <td width="10%" align="left"><?php echo $row['quarterone_achiv'];?></td>
      <td width="10%" align="left"><?php echo $row['year'];?></td>
     
     
         </td>
       </tr>
  <?php  }  ?>
    </tbody>
    <tfoot>
            
    </tfoot>
  </table>
  
  
  </form> 