<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Categories extends Controller_Tmp { 
    
    /**
    * Instance for Apiki_Buscape_API class
    * @var Object
    */
    public $objBuscapeApi;
    

    /**
    * Baby's category ID on Buscape
    * @var int
    */
    protected $categoryIdBabys = 3473;
    

    /**
    * Baby's category XML
    * @var Object XML
    */
    public $categoryBabys;


    /**
    * Array containing all subcategories ID on Buscape
    * @var Array
    */
    public $aSubcategoriesId = array(
        'subBainToilette' => array(
            'http://sandbox.buscape.com/service/findProductList/7838643852314c587376343d/br/?categoryId=5812', // Banheira para BebÃª
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=476', // Condicionador para Bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=479', // Sabonete
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=475', // Shampoo
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10823' // Termometro para banho
        ),
        'subHygieneBabyCare' => array(
            //'293' => 'http://sandbox.buscape.com/service/findCategoryList/7838643852314c587376343d/br/?categoryId=293',
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10597', //Aspirador Nasal
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10600', // Escova de cabelo para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10602', // Hidratante 
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=481', // Agua de Colonia para o bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10599', // Creme para pentear bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10601', // Escova de dente para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=478', // Lenço Umidecido
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10603', // Oleo para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=3219', // Pomada para assaduras
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=477', // Talco
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=9057', // Troninho para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=3113', // Termometro
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=2347', // Outros de higiene
        ),
        'subFeeding' => array(
            //'5865' => 'http://sandbox.buscape.com/service/findCategoryList/7838643852314c587376343d/br/?categoryId=5865',
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10729', // Babador 
            'http://sandbox.buscape.com/service/findProductList/7838643852314c587376343d/br/?categoryId=10730', // Cadeirao
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10731', // Caneca para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6535', // Copo
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6537', // Pratinhos
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10733', // Talheres
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10732', // Conjunto de mesa
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10734' // Outros
        ),
        'subBottlesAcessories' => array(
            //'3326',
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=5490', // Mamadeira 
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10812', // Aquecedor de mamadeira
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=5489', // Bico de mamadeira
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10813', // Escorredor de mamadeira
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10814', // Escova para mamadeira
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10815', // Esterelizador
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10816', // Porta mamadeira
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=5711' // Outros
            
        ),
        'subPacifierAccessories' => array(
            //'3305'
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=11029', // Chupeta
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=11030', // Porta chupeta
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=11031', // Prendedor de chupeta
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=11032' // Outros
        ),
        'subToys' => array(
            // '2412'
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10323', // Chocalho
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=5808', // Mobile
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10322', // Mordedor
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10324' // Outros
        ),
        'subBedroom' => array(
            'http://sandbox.buscape.com/service/findProductList/7838643852314c587376343d/br/?categoryId=5809', // Berço
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10820', // Protetor de berço
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6557,', // Cama, Mesa e Banho 
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=8766' // Enfeite / Decoração para Quarto do Bebê
        ),
        'subStroll' => array(
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10817', // Canguru para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6536' // Bolsa, mala e trocador para bebe
        ),
        'subClothes' => array(
            // '2470'
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=2488', // Blusinhas
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=2487', // Calça
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=2489', // Camisetas
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6548', // Conjuntinho
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=5867', // Macacao
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=9572', // Maiô
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10592', // Pijama
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6549', // Shorts
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=9571', // Sunga
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6550', // Vestidinho
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=2503', // Outros
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=6554' // Calçados
        ),
        'subActivities' => array(
            'http://sandbox.buscape.com/service/findProductList/7838643852314c587376343d/br/?categoryId=5805', // Andador
            'http://sandbox.buscape.com/service/findProductList/7838643852314c587376343d/br/?categoryId=9795' // Tapetes de Atividades
        ),
        'subHomeSafety' => array(
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10818', // Grade de proteçao
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10819', // Mosquiteiro
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10822',  // Protetor de quina
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10821', // Protetor de tomada
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10824', // Trava de segurança
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=7727', // Almofada anti-refluxo
            'http://sandbox.buscape.com/service/findProductList/7838643852314c587376343d/br/?categoryId=9907', // Cercado para bebe
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10825' // Outros
        ),
        'subForCar' => array(
            'http://sandbox.buscape.com/service/findProductList/7838643852314c587376343d/br/?categoryId=5816', // Cadeira para Auto
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=11013' // Base de Cadeira para Auto
        ),
        'subBabyGear' => array(
            'http://sandbox.buscape.com/service/findProductList/7838643852314c587376343d/br/?categoryId=5807', // Baba eletronica
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10969'// Cadeira de Descanso para Bebê 
        ),
        'subBabyStrollers' => array(
            'http://sandbox.buscape.com/service/findProductList/7838643852314c587376343d/br/?categoryId=5817' // Carrinho para Bebê
        ),
        'subDiapers' => array(
            'http://sandbox.buscape.com/service/findProductList/7838643852314c587376343d/br/?categoryId=482' // Fraldas
        ),
        'subForMom' => array(
            //'6160',
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10735', // almofada para amamentaçao
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10736', // Bombinha para tirar leite
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10738', // Conchas para Amamentação
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10737', // Lingerie para mamae
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=8430', // Creme anti-estrias
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=3448', // Album de fotos
            'http://sandbox.buscape.com/service/findOfferList/7838643852314c587376343d/br/?categoryId=10739' // Outros
        )
    );
    
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
    // Higiene e Cuidados: 3113 (TermÃ´metro)
    // Hora da refeiçao: 10730 (CadeirÃ£o para BebÃª)
    // Roupinhas: 6554 (CalÃ§ados para BebÃª)
    // Atividades e Brincadeiras: 9795 (Tapetes de Atividades)
    // Equipamentos para o bebê: 5807 (BabÃ¡ EletrÃ´nica), 10969 Cadeira de Descanso para BebÃª, 9907 (Cercado para BebÃª)
    // Para a mamae: 3448 (Ãlbum de Fotos)

    
    /**
    * Each subcategory for us 
    * @var array
    */
    public $subBainToilette; // Banho e toilette
    public $subHygieneBabyCare; // Higiene e Cuidados
    public $subFeeding; // Hora da refeiçao
    public $subBottlesAcessories; // Mamadeiras e Acessorios
    public $subPacifier; // Chupetas e Acessorios
    public $subToys; // Brinquedos
    public $subBedroom; // Quarto
    public $subStroll; // Passeio
    public $subClothes; // Roupinhas
    public $subActivities; // Atividades e Brincadeiras
    public $subHomeSafety; // Segurança em casa
    public $subForCar; // Para o carro
    public $subBabyGear; // Equipamentos para o bebê
    public $subBabyStrollers; // Carrinho de bebê
    public $subDiapers; // Fraldas
    public $subForMom; // Para a mamae
    
    
    public function before() {
        parent::before();
        
        $applicationID = '7838643852314c587376343d';
        $sourceID = '9262544';
        
        // Instance for Apiki_Buscape_API class
        $this->objBuscapeApi = new Apiki_Buscape_API( $applicationID );
    }
    
    public function action_index() { 
        $subCategory = $this->getSubcategorie('subHygieneBabyCare');
        $subcategoryProducts = $subCategory; 

        $this->template->content = View::factory('categories')
                                    ->set('aSubCategory', $subcategoryProducts);
    }
    
    
    public function createSubcategories($subcategoryName) {
        $aCache = array();
        
        // Check the main Babys category to see each url we need to call 
        $mainXMLcategory = simplexml_load_file('http://sandbox.buscape.com/service/findCategoryList/7838643852314c587376343d/br/?categoryId=3473');

        foreach ($this->aSubcategoriesId[$subcategoryName] as $key => $categoryId) {

            foreach ($mainXMLcategory as $key => $subCategory) {
                if($subCategory->attributes()->id == $categoryId)
                {
                    print_r($subCategory);
                    // Get the url XMl of each subcategory
                    //$subCategoryXML = $subCategory->links->link[1]->attributes()->url;

                    // Some subcategories has not a XML url provided, but we can access thoses by findCategoryList URL
                    //if($subCategoryXML = '')
                       // $subCategoryXML = 'http://sandbox.buscape.com/service/findCategoryList/7838643852314c587376343d/br/?categoryId=' . $categoryId;

                    //print_r($subCategoryXML); // . '<br />';
                    
                    //$mapUrl = file_get_contents($subCategoryXML);
                    //array_push($aCache, $mapUrl);

                }
            }
        }
        
        Cache::instance()->set($subcategoryName, $aCache, 5);
    }
    

    /*
    * to get the products of a subcategory
    * @param {String} the subcategory name
    * Returns an array with products of the category
    * 
    * As we decided to join some Buscape's categories in one only, some categories has 2 or 3 Buscape's categories inside. That's way some array returned
    */
    public function getSubcategorie($subcategoryName) {
        $aSubcategoryProducts = array();

        if($this->$subcategoryName = Cache::instance()->get($subcategoryName))
        {
            foreach ($this->$subcategoryName as $key => $xml) {
                $subcategoryXml = simplexml_load_string($xml);
                foreach ($subcategoryXml->product as $key => $product) {
                    array_push($aSubcategoryProducts, $product);
                }
            }            
            echo 'CACHE';
        }
        
        else 
        {
            echo 'NOT CACHE';
            $this->createSubcategories($subcategoryName);

            $this->$subcategoryName = Cache::instance()->get($subcategoryName);
            foreach ($this->$subcategoryName as $key => $xml) {
                $subcategoryXml = simplexml_load_string($xml);
                foreach ($subcategoryXml->product as $key => $product) {
                    array_push($aSubcategoryProducts, $product);
                }
            }            
        }
        
        return $aSubcategoryProducts;
        
    }
    
    
}
