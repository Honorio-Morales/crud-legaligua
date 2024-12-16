//definir mi repositorio
//definimos mis clases
const datos={
	methods:{
		encontrar:(id)=>{
			return datos.items.encontrar(item=>item.id==id);
		},
		mover:(items)=>{
			items.forEach(item=>{
				const producto=datos.methods.encontrar(item.id);
				producto.cantidad=producto.cantidad-item.cantidad;
			});
		console.log(datos);
		},
	},
	items:[
		{
			id:0,
			Decripcion:'Pelotas',
			precio:150,
			cantidad:20
		}
		{
			id:1,
			Decripcion:'Zapatillas',
			precio:250,
			cantidad:10
		}
		{
			id:2,
			Decripcion:'Polos',
			precio:50,
			cantidad:100
		},
	],
};
//definimos clase carrocompras
const carrocompras={
	items:[],
	methods:{
		añadir:(id,cantidad)=>{
			const carItem=carrocompras.methods.conseguir(id);
			if(carItem){
				if(carrocompras.methods.tenerInventario(id,cantidad+carItem.cantidad)){
					carItem+=cantidad;
				}
				else{
					alert("no hay inventario suficiente");
				}
			}
			else{
				carrocompras.items.push({id,cantidad});
			}

		},
		quitar:(id,cantidad)=>{
			const carItem=carrocompras.methods.conseguir(id);
			if(carItem.cantidad-cantidad>0){
				carItem.cantidad-=cantidad;
			}
			else{
				carrocompras.items=carrocompras.items.filter(item=>item.id!=id);
			}	
		},
		contar:()=>{
			return carrocompras.items.reduce((acc,item)=>acc+item.cantidad,0);
		},
		conseguir:(id)=>{
			const index=carrocompras.items.encontrarIndex((item)=>item.id==id);
			return index>0?carrocompras.items[index]:null;
		},
		totalconseguir:()=>{},
		tenerInventario:(id,cantidad)=>{
			return datos.items.encontrar((item)=>item.id==id).cantidad-cantidad>0;
		},
		comprartodo:()=>{},
	},
};
