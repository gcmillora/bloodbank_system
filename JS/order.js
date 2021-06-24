function sortReq(columnName,req){
  var sort, opp;
  var col = 0;
  switch(columnName){
    case "user.User_Name":
      sort = $("#sort_name").val();
      $("#sort_address").val("ASC");
      $("#sort_blood_type").val("ASC");
      $("#sort_sex").val("ASC");
      col = 1;
      break;
    case "user.User_Address":
      sort = $("#sort_address").val();
      $("#sort_name").val("ASC");
      $("#sort_blood_type").val("ASC");
      $("#sort_sex").val("ASC");
      col = 2;
      break;
    case "user.User_Blood_Type":
      sort = $("#sort_blood_type").val();
      $("#sort_name").val("ASC");
      $("#sort_address").val("ASC");
      $("#sort_sex").val("ASC");
      col = 3;
      break;
    case "user.User_Sex":
      sort = $("#sort_sex").val();
      $("#sort_name").val("ASC");
      $("#sort_address").val("ASC");
      $("#sort_blood_type").val("ASC");
      col = 4;
      break;
  }
  if(sort == "ASC") opp = "DESC";
  else opp = "ASC";
  $.ajax({
    url:'php/fetch_req.php',
    type:'POST',
    data:{columnName:columnName,sort:sort,req:req},
    success: function(response){
      $("#table-requested tr:not(:first)").remove();
      $("#table-requested").append(response);
      switch(col){
        case 1: $("#sort_name").val(opp);
          break;
        case 2: $("#sort_address").val(opp);
          break;
        case 3: $("#sort_blood_type").val(opp);
          break;
        case 4: $("#sort_sex").val(opp);
          break;
      }
    }
  });
}

function sortStk(columnName){
  var sort, opp;
  var col = 0;
  switch(columnName){
    case "btype":
      sort = $("#sort_btype").val();
      $("#sort_stat").val("ASC");
      $("#sort_q").val("ASC");
      col = 1;
      break;
    case "stat": 
      sort = $("#sort_stat").val();
      $("#sort_btype").val(opp)
      $("#sort_q").val("ASC");
      col = 2;
      break;
    case "q":
      sort = $("#sort_q").val();
      $("#sort_btype").val(opp)
      $("#sort_stat").val("ASC");
      col = 3;
      break;
  }
  if(sort == "ASC") opp = "DESC";
  else opp = "ASC";
  $.ajax({
    url:'php/fetch_stk.php',
    type:'POST',
    data:{columnName:columnName,sort:sort},
    success: function(response){
      $("#table-requested tr:not(:first)").remove();
      $("#table-requested").append(response);
      switch(col){
        case 1: $("#sort_btype").val(opp);
          break;
        case 2: $("#sort_stat").val(opp);
          break;
        case 3: $("#sort_q").val(opp);
          break;
      }
    }
  });
}

function send_alert(){
  alert("wah");
}

function approve(bid,uid,btype){
  if(confirm("Approve?")){
    $.ajax({
      url:'php/assess_req.php',
      type:'POST',
      data:{bid:bid,uid:uid,btype:btype,res:"approved"},
      success: function(response){
        $("#table-requested tr:not(:first)").remove();
        $("#table-requested").append(response);
        alert("Request Successful");
      },
      error: function(jqXHR,exception){
        alert(jqXJR,"\n",exception);
      }
    });
  }
}
function reject(bid,uid,btype){
  alert("Blood Type " + btype);
}