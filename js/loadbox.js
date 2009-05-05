// JavaScript Document
var loadbox = {
	func : function(){},
	load : function(url,func,width,height){
		this.func = func;
		var shield = document.createElement("DIV");
		shield.id = "shield";
		shield.style.position = "absolute";
		shield.style.zIndex = "100";
		shield.style.left = "0px";
		shield.style.top = "0px";
		shield.style.width = "100%";
		shield.style.height = ((document.documentElement.clientHeight>document.documentElement.scrollHeight)?document.documentElement.clientHeight:document.documentElement.scrollHeight)+"px";
		shield.style.background = "#efefef";
		shield.style.textAlign = "center";
		shield.style.zIndex = "10000";
		shield.style.filter = "alpha(opacity=0)";
		shield.style.opacity = 0;
	
		var alertFram = document.createElement("DIV");
		alertFram.id="alertFram";
		alertFram.style.position = "absolute";
		alertFram.style.left = "50%";
		alertFram.style.top = "50%";
		alertFram.style.marginLeft = "-225px" ;
		alertFram.style.marginTop = -75+document.documentElement.scrollTop+"px";
		alertFram.style.width = (width ? width : 350) + "px";
		alertFram.style.height = (height? height : 200) + "px";
		alertFram.style.background = "#efefef";
		alertFram.style.textAlign = "center";
		alertFram.style.lineHeight = "80px";
		alertFram.style.zIndex = "10001";
	
		strHtml  = '<span style="line-height:20px;float:right; height:20px; padding-right:10px;"><a href="javascript:;" onclick="loadbox.unload();" title="关闭"><b>X</b></a></span>';
		strHtml  += '<iframe frameborder="0" name="load_box" id="load_box" width="' + (width ? width : 350) + '" height="' + (height? height : 200) + '" src="' + url + '"></iframe>';	
		alertFram.innerHTML = strHtml;
		
		document.body.appendChild(alertFram);
		document.body.appendChild(shield);

		document.body.onselectstart = function(){return false;}
		document.body.oncontextmenu = function(){return false;}
		
		this.c = 0;
		//this.ad = setInterval(this.doAlpha(),1);
	},
	
	doAlpha : function(){
			  if (++ this.c > 20){clearInterval(this.ad);return 0;}
			  this.setOpacity(document.getElementById('shield'),this.c);
	},
	
	setOpacity : function(obj,opacity){
		  if(opacity>=1)opacity=opacity/100;
		  try{ obj.style.opacity=opacity; }catch(e){}
		  try{ 
				 if(obj.filters.length>0 && obj.filters("alpha")){
						obj.filters("alpha").opacity=opacity*100;
				 }else{
						obj.style.filter="alpha(opacity=\""+(opacity*100)+"\")";
				 }
		  }catch(e){}
	},
	
	complete : function(data){
		  document.body.removeChild(document.getElementById('alertFram'));
		  document.body.removeChild(document.getElementById('shield'));
		  document.body.onselectstart = function(){return true;}
		  document.body.oncontextmenu = function(){return true;}
		  this.func(data);
	},
	
	unload : function(){
		  document.body.removeChild(document.getElementById('alertFram'));
		  document.body.removeChild(document.getElementById('shield'));
		  document.body.onselectstart = function(){return true;}
		  document.body.oncontextmenu = function(){return true;}
	}
}
