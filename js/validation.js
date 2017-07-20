	$(document).ready(function(){
			$('#submit').click(function(){
     var sname=document.getElementById('st_name').value;
     var fname=document.getElementById('st_father').value;
     var city=document.getElementById('st_city').value;
     var state=document.getElementById('st_state').value;
     var country=document.getElementById('st_country').value;
     var mobile=document.getElementById('st_mobile').value;
     var character_chk=/^[a-zA-Z]*$/;
     var number_chk=/^[0-9]*$/;
     var length=mobile.length;
     if (sname=="" || !(character_chk.test(sname))) {
     	$("#er").html("Enter your name (Only Characters)");
     	$("#st_name").focus();
     	return false;
     }
     if (fname=="" || !(character_chk.test(sname))) {
     	$("#er").html("Enter your father's name");
     	$("#st_father").focus();
     	return false;
     }
      if (city==0) {
     	$("#er").html("Select your city");
     	$("#st_city").focus();
     	return false;
     }
     if (state==0) {
     	$("#er").html("Select your state");
     	$("#st_state").focus();
     	return false;
     }
     if (country==0) {
     	$("#er").html("Select your country");
     	$("#st_country").focus();
     	return false;
     }
     // Gender validation
     if (!$('input[name=st_gender]:checked').val()){
     	$("#er").html("Select your gender");
     	$("#st_gender").focus();
     	//alert($('input[name=st_gender]:checked').val());
     	return false;
     }
     

    if (mobile==""|| !(number_chk.test(mobile))) {
     	$("#er").html("Enter your mobile number (Only Digits)");
     	$("#st_mobile").focus();
     	return false;
     }
	});
});

	function delete_student(st_id)
	{
		if (confirm("Do you want to delete the student? "))
			{
				this.document.student_view.st_id.value=st_id;
				//this.document.student_view.actdelete.value="delete_student";
				this.document.student_view.submit();
			}
	}

	function delete_multiple()
	{
		if (confirm("Do you want to delete the selected students? "))
		 {
		 	this.document.student_view.acts.value="delete_multiple";
		 	this.document.student_view.submit();
		 }
	}

 //Check All to delete

 function check_all(obj)
 {
    var frm_obj=this.document.student_view;
    var length=frm_obj.elements.length;
    for (var i = 0; i < length; i++) {
     if (frm_obj.elements[i].type=="checkbox") 
     {
      frm_obj.elements[i].checked=obj.checked;    
     }
    }
}   