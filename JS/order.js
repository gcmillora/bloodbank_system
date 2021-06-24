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
    },
    error: function(jqXHR,exception){
      alert(jqXJR,"\n",exception);
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
    },
    error: function(jqXHR,exception){
      alert(jqXJR,"\n",exception);
    }
  });
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
        alert("Request Accepted");
      },
      error: function(jqXHR,exception){
        alert(jqXJR,"\n",exception);
      }
    });
  }
}
function reject(bid,uid,btype){
  if(confirm("Reject?")){
    $.ajax({
      url:'php/assess_req.php',
      type:'POST',
      data:{bid:bid,uid:uid,btype:btype,res:"rejected"},
      success: function(response){
        $("#table-requested tr:not(:first)").remove();
        $("#table-requested").append(response);
        alert("Request Rejected");
      },
      error: function(jqXHR,exception){
        alert(jqXJR,"\n",exception);
      }
    });
  }
}

function sortHosp(columnName){
  var sort, opp;
  var col = 0;
  switch(columnName){
    case "Hospital_Name":
      sort = $("#sort_hosp").val();
      $("#sort_loc").val("ASC");
      $("#sort_num").val("ASC");
      col = 1;
      break;
    case "Hospital_Address":
      sort = $("#sort_loc").val();
      $("#sort_hosp").val("ASC");
      $("#sort_num").val("ASC");
      col = 2;
      break;
    case "Hospital_Contact_Number":
      sort = $("#sort_num").val();
      $("#sort_hosp").val("ASC");
      $("#sort_loc").val("ASC");
      col = 3;
      break;
  }
  if(sort == "ASC") opp = "DESC";
  else opp = "ASC";
  $.ajax({
    url:'php/fetch_hosp.php',
    type:'POST',
    data:{columnName:columnName,sort:sort},
    success: function(response){
      $("#table-hosp tr:not(:first)").remove();
      $("#table-hosp").append(response);
      switch(col){
        case 1: $("#sort_hosp").val(opp);
          break;
        case 2: $("#sort_loc").val(opp);
          break;
        case 3: $("#sort_num").val(opp);
          break;
      }
    },
    error: function(jqXHR,exception){
      alert(jqXJR,"\n",exception);
    }
  });
}