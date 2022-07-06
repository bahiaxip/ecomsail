/*
document.addEventListener('DOMContentLoaded',function(){
	console.log("cargado")
})
*/

class MDSlider {
	
		
	constructor(){
		
		this.slider_active = 0;
		this.elements = 0;
		this.items;
		//this.items = document.getElementsByClassName('md-slider-item');
		//this.elements = items.length;
		this.init();
	}

	init(){
		
		//necesario para cargar el DOM : DOMContentLoaded
		document.addEventListener('DOMContentLoaded',() =>{
			this.show();
			var md_slider_nav_prev = document.getElementById('md_slider_nav_prev');
			var md_slider_nav_next = document.getElementById('md_slider_nav_next');
			
		//opción1: pasamos el objeto this (MDSlider Class), necesaria función de tipo flecha en 
		//el callback del addEventListener de DOMContentLoaded
			/*
			let mdsliderClass = this;			
			if(md_slider_nav_prev){
				md_slider_nav_prev.addEventListener('click', function(){
					mdsliderClass.navigation('prev')
				})
			}
			*/

		//opción2: otra forma es usar el método bind para pasar el contexto de this
			md_slider_nav_prev ? md_slider_nav_prev.addEventListener('click',function(){
				this.navigation('prev')}.bind(this)) : null;			

			md_slider_nav_next ? md_slider_nav_next.addEventListener('click',function(){
				this.navigation('next')}.bind(this)) : null;

			this.slide();
		})
	}
	
	show(){		
		var items = document.getElementsByClassName('md-slider-item');
		this.items = items;
		this.elements = this.items.length - 1;
		for(let i=0;i<this.items.length;i++){
			let pos = i * 100;
			this.items[i].style.left = pos+'%';			
			this.items[i].style.display = 'flex';			
		}
		console.log('Slider Activo: '+this.slider_active+' - Total Slides: '+this.elements);
	}
	//intervalo de slider
	slide(){
		setInterval(()=>{
			this.navigation('next');	
		},6000);
		
	}	

	navigation(action){
		//console.log(action);

		if(action == 'prev'){
			
			if(this.slider_active > 0){
				this.slider_active = this.slider_active - 1;
				console.log("slider_active: ",this.slider_active)
				for(let i=0;i<this.items.length;i++){					
					let pos = parseInt(this.items[i].style.left) + 100;
					this.items[i].style.left = pos+'%';
				}
				//this.slider_active = this.slider_active -1;			
			}
			//para primer slider dirigir al último slider
			else{

				this.slider_active=this.elements ;
				//this.slider_active = this.slider_active - 1;
				console.log("slider_active: ",this.slider_active)
				
				for(let i=0;i<this.items.length;i++){					
					let pos = parseInt(this.items[i].style.left) - 100* this.elements;
					this.items[i].style.left = pos+'%';
				}
				

				console.log("no es")
			}
		}
		if(action == 'next'){			
			if(this.slider_active < this.elements){
				this.slider_active = this.slider_active + 1;
				console.log("slider_active: ",this.slider_active)
				for(let i=0;i<this.items.length;i++){
					//var pos = i * 100;
					let pos = parseInt(this.items[i].style.left) - 100;
					this.items[i].style.left = pos+'%';
					//console.log(pos);
					//console.log('Slide #' + i + ' Pos: '+ items[i].style.left);
					//items[i].style.left = pos+'%';
					//items[i].style.display = 'flex';
				}				
				
			}else{
				//para último slider, volver al principio
				this.slider_active=0;
				//se puede hacer con show() o con el for()
				//this.show();
				for(let i=0;i<this.items.length;i++){
					//var pos = i * 100;
					let pos = parseInt(this.items[i].style.left) + 100 * this.elements;
					this.items[i].style.left = pos+'%';				
				}

				
			}
		}
		//this.active();
	}



}

/*
function navigation(){
console.log('hola')
}
*/
