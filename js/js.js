function showBtn1() {
    const passField1 =document.getElementById('dk1');
    const showBtn1 = document.getElementById('showBtn1');
	const hideBtn1 = document.getElementById('hideBtn1');
	if(passField1.type == "password") {
		passField1.setAttribute('type', 'text');
		showBtn1.classList.add('d-none');
		hideBtn1.classList.remove('d-none');
	} else {
		passField1.setAttribute('type', 'password');
		showBtn1.classList.remove('d-none');
		hideBtn1.classList.add('d-none');
	}
}

function showBtn2() {
    const passField2 =document.getElementById('dk2');
	const showBtn2 = document.getElementById('showBtn2');
	const hideBtn2 = document.getElementById('hideBtn2');
	if(passField2.type == "password") {
		passField2.setAttribute('type', 'text');
		showBtn2.classList.add('d-none');
		hideBtn2.classList.remove('d-none');
	} else {
		passField2.setAttribute('type', 'password');
		showBtn2.classList.remove('d-none');
		hideBtn2.classList.add('d-none');
	}
}


function hideMail() {
	const input_mail = document.getElementById('input_mail');
	const tag_p = document.getElementById('tag-p')
	var mail_length = (document.getElementById('input_mail').value).length
	console.log(mail_length)
	
	if (mail_length > 25) {
		tag_p.classList.add('d-none')
	} else {
		tag_p.classList.remove('d-none')
	}
}
	
function box1() {
	const box_sanpham =document.getElementById('fram-content');
	const box_xoa = document.getElementById('fram-content-xoa');
	const box_add = document.getElementById('fram-content-add');
	
	const box_1 = document.getElementById('btn-1')
	const box_2 = document.getElementById('btn-2')
	const box_3 = document.getElementById('btn-3')
	box_sanpham.classList.remove('d-none');
	box_xoa.classList.add('d-none');
	box_add.classList.add('d-none');

	box_1.classList.add('active-bt')
	box_2.classList.remove('active-bt')
	box_3.classList.remove('active-bt')
}

function box2() {
	const box_sanpham =document.getElementById('fram-content');
	const box_xoa = document.getElementById('fram-content-xoa');
	const box_add = document.getElementById('fram-content-add');

	const box_1 = document.getElementById('btn-1')
	const box_2 = document.getElementById('btn-2')
	const box_3 = document.getElementById('btn-3')
	box_sanpham.classList.add('d-none');
	box_xoa.classList.remove('d-none');
	box_add.classList.add('d-none');

	box_1.classList.remove('active-bt')
	box_2.classList.add('active-bt')
	box_3.classList.remove('active-bt')
}

function box3() {
	const box_sanpham =document.getElementById('fram-content');
	const box_xoa = document.getElementById('fram-content-xoa');
	const box_add = document.getElementById('fram-content-add');
	const box_1 = document.getElementById('btn-1')
	const box_2 = document.getElementById('btn-2')
	const box_3 = document.getElementById('btn-3')
	box_sanpham.classList.add('d-none');
	box_xoa.classList.add('d-none');
	box_add.classList.remove('d-none');

	box_1.classList.remove('active-bt')
	box_2.classList.remove('active-bt')
	box_3.classList.add('active-bt')
}