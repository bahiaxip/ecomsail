<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product as Prod;
use Illuminate\Http\Request;
class Product extends Component
{
    public $name;
    public $status=0;
    public $category;
    public $category_id;
    public $subcategory_id;
    public $state_discount;
    public $discount;
    public $init_date_discount;
    public $end_date_discount;
    public $detail;
    public $image;
    public $code;
    public $prod_id;
    //temporal de confirmación
    public $prodIdTmp;
    //tipo de filtrado (publico,borrador,reciclaje,todos)
    public $filter_type;
    

    public function mount($filter_type){
        $this->filter_type = $filter_type;    
    }
    public function updated(){
        
    }

    public function set_filter_query($filter_type){
        $prod=[];
        switch($filter_type):
            case '0':
                //$this->filterType = $filterType;
                $prod = Prod::where('status',$filter_type)->orderBy('id','desc')->paginate(20);
                break;
            case '1':                
                $prod = Prod::where('status',$filter_type)->orderBy('id','desc')->paginate(20);
                break;
            case '2':                
                $prod = Prod::onlyTrashed()->orderBy('id','desc')->paginate(20);
                break;
            case '3':                
                $prod = Prod::orderBy('id','desc')->paginate(20);
                break;

        endswitch;
        return $prod;
    }

    public function store(){
        $validated = $this->validate([
            'name' => 'required',
            'detail' => 'required',
            'status' => 'required'
        ]);
        $category = Prod::create([
            'name' => $validated['name'],
            'detail' =>$validated['detail'],
            'category_id' => 0,
            'subcategory_id' => 0,
            'status' => $validated['status']
        ]);
        session()->flash('message',"Producto creado correctamente");
        $this->clear2();
        $this->emit('addProduct');
    }

    public function edit($id){
        //sleep(3);
        //registro de la tabla users con el usuario seleccionado
        $prod
        =Prod::where('id',$id)->first();
        $this->prod_id=$prod->id;
        //(se podría evitar la consulta $user y llamar al método user del modelo 
        //Profile belongsTo...)
        //asignación de datos mediante consulta a tabla users 
        $this->name = $prod->name;        
        $this->detail=$prod->detail;
        $this->category_id = $prod->category_id;
        $this->status=$prod->status;        
    }

    public function update(){
        $validated = $this->validate([
            'name' => 'required',
            'detail' => 'required',
            'status' => 'required'
        ]);
        if($this->prod_id){
            $prod = Prod::where('id',$this->prod_id)->first();
            $prod->update([
                'name' => $validated['name'],
                'detail' =>$validated['detail'],
                'category_id' => 0,
                'subcategory_id' => 0,
                'status' => $validated['status']
            ]);
        }
        session()->flash('message','Producto actualizado correctamente');
        $this->clear2();
        $this->emit('editProduct');
    }

    public function saveProdId($prodId){
        $this->prodIdTmp=$prodId;
    }
    //si se recarga la página tb ser resetea el userIdTmp, en el método mount()
    public function clearProdId(){
        $this->prodIdTmp='';
    }

    //eliminación de categoría
    public function delete(){
        if($this->prodIdTmp){
            $prod=Prod::where('id',$this->prodIdTmp)->first();
            //comprobamos si existe imagen y si existe y
            //es distinta a la asignada por defecto se elimina del server
            /*
            $exists=Storage::disk('public')->exists($profile->file);
            if($exists && $profile->file != 'img/person.png'){
                Storage::disk('public')->delete($profile->file);
                session()->flash('message',$profile->file);    
            }
            */            
            //$user=User::where('id',$this->userIdTmp)->first();
            //$profile->delete();
            $prod->delete();
            session()->flash('message',"Producto eliminado correctamente");
            $this->clear2();
            $this->emit('confirmDel');
        }
    }

    //limpiar datos de formulario
    public function clear(){
        if($this->prod_id)
            $this->prod_id='';        
        $this->name='';
        $this->detail = '';
        $this->status=0;

        //$this->emit('userUpdated');
    }

    public function clear2(){
        $this->clear();
        //resetea todos los campos necesario para input file
        //$this->resetValidation();
    }

    public function render()
    {
        $query = $this->set_filter_query($this->filter_type);
        $data = ['products' => $query];
        return view('livewire.admin.products.index',$data);
    }

}
