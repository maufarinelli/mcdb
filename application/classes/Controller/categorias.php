<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Categorias extends Controller_Tmp { 
    
    /**
    * Instance for Apiki_Buscape_API class
    *
    * @var Object
    */
    public $objBuscapeApi;
    
    /**
    * Baby's category ID on Buscape
    *
    * @var int
    */
    protected $categoryIdBabys = 3473;
    
    /**
    * Baby's category XML
    *
    * @var Object XML
    */
    public $categoryBabys;
    
    /**
    * Baby's subcategories XML
    * Buscape divides in subcategories and top5 categories
    * We need to get both
    *
    * @var Array
    */
    public $subcategoriesBabys;
    public $subcategoriesTop5;
    
    /**
    * Each subcategory for us 
    *
    * @var array
    */
    public $subBainToilette = []; // Banho e toilette
    public $subHygieneBabyCare = []; // Higiene e Cuidados
    public $subFeeding = []; // Hora da refeiçao
    public $subBottlesAcessories = []; // Mamadeiras, Chupetas e Acessorios
    public $subToys = []; // Brinquedos
    public $subBedroom = []; // Quarto
    public $subStroll = []; // Passeio
    public $subClothes = []; // Roupinhas
    public $subActivities = []; // Atividades e Brincadeiras
    public $subHomeSafety = []; // Segurança em casa
    public $subForCar = []; // Para o carro
    public $subBabyGear = []; // Equipamentos para o bebê
    public $subBabyStrollers = []; // Carrinho de bebê
    public $subDiapers = []; // Fraldas
    public $subForMom = []; // Para a mamae
    
    
    public function before() {
        parent::before();
        
        $applicationID = '7838643852314c587376343d';
        $sourceID = '9262544';
        
        // Instance for Apiki_Buscape_API class
        $this->objBuscapeApi = new Apiki_Buscape_API( $applicationID );
        $this->createSubcategories();
    }
    
    public function action_index() {
        
        $this->template->content = View::factory('categories')
                                    //->set('aSubBainToilette', $this->subBainToilette)
                                    ->set('aProductsBainToilette', $this->productsBainToilette);
    }
    
    public function createSubcategories() {
        
        //Baby's Category
        $this->categoryBabys = simplexml_load_string($this->objBuscapeApi->findCategoryList(array('categoryId' => $this->categoryIdBabys)));
        
        /*Each baby's subcategory - @var array */
        $this->subcategoriesBabys = $this->categoryBabys->subCategory;
        
        /* Each baby's subcategoriesTop5 - @var array */
        $this->subcategoriesTop5 = $this->categoryBabys->top5category;
        
        // get each subcategory 
        $this->subBainToilette = simplexml_load_string($this->objBuscapeApi->findProductList(array('categoryId' => '5812')));
        $this->productsBainToilette = $this->subBainToilette->product;
        foreach ($this->subcategoriesBabys as $i=>$aSub) {
            /*if($aSub->attributes()->id == '5812')
                array_push($this->subBainToilette, $aSub); */
            
            if($aSub->attributes()->id == '293')
                array_push($this->subHygieneBabyCare, $aSub);
            
            if($aSub->attributes()->id == '5865')
                array_push($this->subFeeding, $aSub);
            
            if($aSub->attributes()->id == '3326' || $aSub->attributes()->id == '3305')
                array_push($this->subBottlesAcessories, $aSub);
            
            if($aSub->attributes()->id == '2412')
                array_push($this->subToys, $aSub);
            
            if($aSub->attributes()->id == '5809' || $aSub->attributes()->id == '6557' || $aSub->attributes()->id == '8766')
                array_push($this->subBedroom, $aSub);
            
            if($aSub->attributes()->id == '6536')
                array_push($this->subStroll, $aSub);
            
            if($aSub->attributes()->id == '2470')
                array_push($this->subClothes, $aSub);
            
            if($aSub->attributes()->id == '5805')
                array_push($this->subActivities, $aSub);
            
            if($aSub->attributes()->id == '5811')
                array_push($this->subHomeSafety, $aSub);
            
            if($aSub->attributes()->id == '11013' || $aSub->attributes()->id == '5816')
                array_push($this->subForCar, $aSub);
            
            if($aSub->attributes()->id == '5817')
                array_push($this->subBabyStrollers, $aSub);
            
            if($aSub->attributes()->id == '482')
                array_push($this->subDiapers, $aSub);
            
            if($aSub->attributes()->id == '6160')
                array_push($this->subForMom, $aSub);
        }
        
        
        // get each subcategory 
        /*foreach ($this->subcategoriesTop5 as $i=>$aSub) {
            if($aSub->attributes()->id == '113')
                array_push($this->subHygieneBabyCare, $aSub);         
        }
        */
        //print_r($this->subHygieneBabyCare);
        
        
        
        /* Subcategories 
         --------------------------------------------- */
        // Banho: 5812 (Banheira para BebÃª)        
        // Higiene e Cuidados: 293 (Higiene / SaÃºde para BebÃª)
        // Hora da refeiçao: 5865 (UtensÃ­lios para AlimentaÃ§Ã£o do BebÃª)
        // Mamadeiras, Chupeta  e Acessorios: 3326 (Mamadeira e AcessÃ³rios), 3305 (Chupeta e AcessÃ³rios)
        // Brinquedos: 2412 (Brinquedos para BebÃª)
        // Quarto: 5809 (BerÃ§o), 6557 (Cama / Mesa / Banho para BebÃª), 8766 (Enfeite / DecoraÃ§Ã£o para Quarto do BebÃª)
        // Passeio: 6536 (Bolsa / Mala / Trocador para BebÃª)
        // Roupinhas: 2470 (Moda para BebÃª)
        // Atividades e Brincadeiras: 5805 (Andador para BebÃª)
        // Segurança em casa: 5811 (Artigos de SeguranÃ§a para BebÃª) 
        // Para o carro: 11013 (Base de Cadeira para Auto), 5816 (Cadeira para Auto), 
        // Carrinho de bebê: 5817
        // Fraldas: 482
        // Para a mamae: 6160 (UtensÃ­lios Diversos para a MamÃ£e)
        
        /* Top5Categories
         --------------------------------------------- */
        // Higiene e Cuidados: 113 (TermÃ´metro)
        // Hora da refeiçao: 10730 (CadeirÃ£o para BebÃª)
        // Roupinhas: 6554 (CalÃ§ados para BebÃª)
        // Atividades e Brincadeiras: 9795 (Tapetes de Atividades)
        // Equipamentos para o bebê: 5807 (BabÃ¡ EletrÃ´nica), 10969 Cadeira de Descanso para BebÃª, 9907 (Cercado para BebÃª)
        // Para a mamae: 3448 (Ãlbum de Fotos)
        
        
    }
    
    public function getSubcategories() {
        
        
        
    }
    
    
}
