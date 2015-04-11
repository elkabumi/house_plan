function confirm_delete(id,control){
	var a = confirm("Anda yakin ingin menghapus record ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_onprogress(id,control){
	var a = confirm("Anda yakin ingin memproses data ini?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_done(id,control){
	
	var a = confirm("Apakah sudah terkonfirmasi ?");
	if(a==true){
		window.location.href = control+id;
	}
}
function confirm_transaction(id,control,nopol){
	var a = confirm("Anda yakin ingin mengkonfirmasi kedatangan truck dengan nopol "+nopol);
	if(a==true){
		window.location.href = control+id;
	}
}
function confirm_act(id,control){
	var a = confirm("Anda yakin ingin mengaktifkan data ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_approved(id,control){
	var a = confirm("Anda yakin ingin approve data ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_not_approved(id,control){
	var a = confirm("Anda yakin ingin reject data ini ?");
	if(a==true){
		window.location.href = control+id;
	}
} 
