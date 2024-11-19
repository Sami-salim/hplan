<?php
  $page_title = 'Add Sale';
  //require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  // page_require_level(3);
?>
<?php

  if(isset($_POST['add_sale'])){
    $req_fields = array('id','indicator','unit','yeariyplan','quarterone','quarterone_report','quarterone_achiv','rank','code','date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $id     = $db->escape((int)$_POST['id']);
		  $code     = $db->escape((int)$_POST['code']);
          $indicator     = $db->escape((int)$_POST['indicator']);
          $unit   = $db->escape($_POST['unit']);
		  $yeariyplan   = $db->escape($_POST['yeariyplan']);
		  $quarterone   = $db->escape($_POST['quarterone']);
		  $quarterone_report   = $db->escape($_POST['quarterone_report']);
		  $quarterone_achiv   = $db->escape($_POST['quarterone_achiv']);
		  $rank   = $db->escape($_POST['rank']);
          $date      = $db->escape($_POST['date']);
          $s_date    = make_date();

          $sql  = "INSERT INTO yearly_pland (";
          $sql .= " id,code,indicator,unit,yeariyplan,quarterone,quarterone_report,quarterone_achiv,rank,date";
          $sql .= ") VALUES (";
          $sql .= "'{$id}','{$code}','{$indicator}','{$unit}','{$yeariyplan}','{$quarterone}','{$quarterone_report}','{$quarterone_achiv}','{$rank}','{$s_date}'";
          $sql .= ")";

                if($db->query($sql)){
                  update_product_qty($quarterone_report,$code);
                  $session->msg('s',"Sale added. ");
                  redirect('add_sale.php', false);
                } else {
                  $session->msg('d',' Sorry failed to add!');
                  redirect('add_sale.php', false);
                }
        } else {
           $session->msg("d", $errors);
           redirect('add_sale.php',false);
        }
  }
/* Function for Update planingd report
  /*--------------------------------------------------------------*/
  function update_product_qty($quarterone_report,$id){
    global $db;
    $quarterone_report = (int) $quarterone_report;
    $id  = (int)$id;
    $sql = "UPDATE yearly_pland SET quarterone_report={$quarterone_report}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/* Function for Display Session Message
   Ex echo displayt_msg($message);
/*--------------------------------------------------------------*/
function display_msg($msg =''){
   $output = array();
   if(!empty($msg)) {
      foreach ($msg as $key => $value) {
         $output  = "<div class=\"alert alert-{$key}\">";
         $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
         $output .= remove_junk(first_character($value));
         $output .= "</div>";
      }
      return $output;
   } else {
     return "" ;
   }
}

?>


<div class="row">
  <div class="col-md-6">

    <form method="post" action="ajex.php" autocomplete="off" id="sug-form">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Find It</button>
            </span>
            <input type="text" id="sug_input" class="form-control" name="title"  placeholder="Search for product name">
         </div>
         <div id="result" class="list-group"></div>
        </div>
    </form>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Sale Eidt</span>
       </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="add_sale.php">
         <table class="table table-bordered">
           <thead>
            <th> id</th>
			<th> code </th>
            <th> indicator </th>
            <th> unit</th>
            <th> yeariyplan </th>
			<th> quarterone </th>
			<th> quarterone_report </th>
			<th> quarterone_achiv </th>
			<th>rank</th>
            <th> Date</th>
            <th> Action</th>
           </thead>
             <tbody  id="product_info"> </tbody>
         </table>
       </form>
      </div>
    </div>
  </div>

</div>


