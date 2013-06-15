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
    * Each subcategory for us 
    *
    * @var array
    */
    public $subBainToilette; // Banho e toilette
    public $subFeeding; // Hora da refeiçao
    public $subBottlesAcessories; // Mamadeiras e Acessorios
    public $subToys; // Brinquedos
    public $subBedroom; // Quarto
    public $subHygieneCare; // Higiene e Cuidados
    public $subStroll; // Passeio
    public $subClothes; // Roupinhas
    public $subActivities; // Atividades e Brincadeiras
    public $subHomeSafety; // Segurança em casa
    public $subBabyGear; // Equipamentos para o bebê
    public $subBabyStrollers; // Carrinho de bebê
    public $subDiapers; // Fraldas
    public $subForMom; // Para a mamae
    
    
    public function before() {
        
        $applicationID = '7838643852314c587376343d';
        $sourceID = '9262544';
        
        // Instance for Apiki_Buscape_API class
        $objBuscapeApi = new Apiki_Buscape_API( $applicationID );
        
    }
    
    public function action_index() {
 
        // Result
        //$bathTubs = simplexml_load_string($objApikiBuscapeApi->findCategoryList(array('categoryId' => '5812')));
        
        //$this->template->content = View::factory('categorias');
    }
    
    public function createSubcategories() {
        
        //Baby's Category
        $this->categoryBabys = simplexml_load_string($objBuscapeApi->findCategoryList(array('categoryId' => $categoryIdBabys)));
        
        // Banho: 5812 (Banheira para BebÃª) e algumas coisas de 293 (Higiene)
        
        
        // Hora da refeiçao: 5865 (UtensÃ­lios para AlimentaÃ§Ã£o do BebÃª), 10730 (CadeirÃ£o para BebÃª)
        
        
        // Mamadeiras e Acessorios: 3305 (Chupeta e AcessÃ³rios), 3326 (Mamadeira e AcessÃ³rios)
        
        
        // Brinquedos: 2412 (Brinquedos para BebÃª)
        
        
        // Quarto: 5809 (BerÃ§o), 6557 (Cama / Mesa / Banho para BebÃª), 8766 (Enfeite / DecoraÃ§Ã£o para Quarto do BebÃª)
        
        
        // Higiene e Cuidados: 293 (Higiene / SaÃºde para BebÃª), 3113 (TermÃ´metro)
        
        
        // Passeio: 6536 (Bolsa / Mala / Trocador para BebÃª)
        
        
        // Roupinhas: 2470 (Moda para BebÃª), 6554 (CalÃ§ados para BebÃª)
        
        
        // Atividades e Brincadeiras: 5805 (Andador para BebÃª), 9795 (Tapetes de Atividades)
        
        
        // Segurança em casa: 5811 (Artigos de SeguranÃ§a para BebÃª) 
        
        
        // Equipamentos para o bebê: 5807 (BabÃ¡ EletrÃ´nica), 11013 (Base de Cadeira para Auto), 5816 (Cadeira para Auto),  10969 Cadeira de Descanso para BebÃª, 9907 (Cercado para BebÃª)
        
        
        // Carrinho de bebê: 5817
        
        
        // Fraldas: 482
        
        
        // Para a mamae: 6160 (UtensÃ­lios Diversos para a MamÃ£e), 3448 (Ãlbum de Fotos)
        
        
    }
    
    public function getSubcategories() {
        
        
        
    }
    
    
}
