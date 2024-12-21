<?php
// MyXmlParser.php
class MyXmlParser {
    private $xml;

    public function __construct($filePath) {
        if (!file_exists($filePath)) {
            throw new Exception("File not found!");
        }
        $this->xml = simplexml_load_file($filePath);
    }

    public function parse() {
        // Parse the product-level data.
        $productData = [
            'product_id' => (string)$this->xml->productID,
            'bleaching_code' => (int)$this->xml->bleachingCode,
            'default_language' => (string)$this->xml->defaultLanguage,
            'dry_cleaning_code' => (int)$this->xml->dryCleaningCode,
            'drying_code' => (int)$this->xml->dryingCode,
            'fastening_type_code' => (int)$this->xml->fasteningTypeCode,
            'ironing_code' => (int)$this->xml->ironingCode,
            'pullout_type_code' => (int)$this->xml->pulloutTypeCode,
            'sap_packet' => (int)$this->xml->sapPacket,
            'update_images' => (string)$this->xml->updateImages === 'true' ? 1 : 0,
            'waistline_code' => (int)$this->xml->waistlineCode,
            'washability_code' => (int)$this->xml->washabilityCode,
        ];

        // Parse details data.
        $details = [];
        foreach ($this->xml->definitions->detailsData as $detail) {
            $details[] = [
                'cedi' => (string)$detail->cedi,
                'child_weight_from' => (float)$detail->childWeightFrom,
                'child_weight_to' => (float)$detail->childWeightTo,
                'color_code' => (string)$detail->color_code,
                'color_description' => (string)$detail->color_description,
                'country_images' => (string)$detail->countryImages === 'true' ? 1 : 0,
                'default_sku' => (string)$detail->defaultSku === 'true' ? 1 : 0,
                'preferred_ean' => (string)$detail->preferredEan,
                'sap_assortment_level' => (string)$detail->sapAssortmentLevel,
                'sap_price' => (float)$detail->sapPrice,
                'season' => (string)$detail->season,
                'show_on_line_sku' => (string)$detail->showOnLineSku === 'true' ? 1 : 0,
                'size_code' => (string)$detail->size_code,
                'size_description' => (string)$detail->size_description,
                'sku_id' => (string)$detail->skuID,
                'sku_name' => (string)$detail->skuName,
                'state_of_article' => (string)$detail->stateOfArticle === 'true' ? 1 : 0,
                'um_sap_price' => (string)$detail->umSAPprice,
                'volume' => (float)$detail->volume,
                'weight' => (float)$detail->weight,
            ];
        }

        

        return ['productData' => $productData, 'details' => $details];
    }
}
?>
