
function ajax(obj){
	var xhr=new XMLHttpRequest();
	obj.url+='?rand='+Math.random();
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			if(xhr.status==200){
				obj.success(xhr.responseText);
			}
		}
	}
	var params=[];
	for(var name in obj.data){
		var key=encodeURIComponent(name);
		var value=encodeURIComponent(obj.data[name]);
		params.push(key+'='+value);}
		obj.data=params.join('&');
		if(obj.method=='get'){
			obj.url+='&'+obj.data;
		}
		xhr.open(obj.method,obj.url,obj.async);
	
	
	if(obj.method=='get'){
		xhr.send();
	}else{
		xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xhr.send(obj.data);
	}

   
}