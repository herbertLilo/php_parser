CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id VARCHAR(255),
    bleaching_code INT,
    default_language VARCHAR(255),
    dry_cleaning_code INT,
    drying_code INT,
    fastening_type_code INT,
    ironing_code INT,
    pullout_type_code INT,
    sap_packet INT,
    update_images BOOLEAN,
    waistline_code INT,
    washability_code INT
);


CREATE TABLE product_definitions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    locale VARCHAR(10),
    bag BOOLEAN,
    brand VARCHAR(255),
    brand_code VARCHAR(10),
    catalog VARCHAR(255),
    creation_date TIMESTAMP,
    last_date_changed TIMESTAMP,
    last_user_changed VARCHAR(255),
    e_shop_display_name VARCHAR(255),
    e_shop_long_description TEXT,
    free_delivery BOOLEAN,
    gender VARCHAR(50),
    sap_category_id VARCHAR(10),
    sap_category_name VARCHAR(255),
    sap_division_id VARCHAR(10),
    sap_division_name VARCHAR(255),
    sap_family_id VARCHAR(10),
    sap_family_name VARCHAR(255),
    sap_macrocategory_id VARCHAR(10),
    sap_macrocategory_name VARCHAR(255),
    sap_name VARCHAR(255),
    sap_universe_id VARCHAR(10),
    sap_universe_name VARCHAR(255),
    FOREIGN KEY (product_id) REFERENCES products(id)
);


CREATE TABLE details_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    cedi VARCHAR(255),
    child_weight_from FLOAT,
    child_weight_to FLOAT,
    color_code VARCHAR(50),
    color_description VARCHAR(255),
    country_images BOOLEAN,
    default_sku BOOLEAN,
    preferred_ean VARCHAR(255),
    sap_assortment_level VARCHAR(50),
    sap_price FLOAT,
    season VARCHAR(50),
    show_on_line_sku BOOLEAN,
    size_code VARCHAR(50),
    size_description VARCHAR(255),
    sku_id VARCHAR(255),
    sku_name VARCHAR(255),
    state_of_article BOOLEAN,
    um_sap_price VARCHAR(10),
    volume FLOAT,
    weight FLOAT,
    FOREIGN KEY (product_id) REFERENCES products(id)
);


CREATE TABLE product_features (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    feature_type VARCHAR(50), -- e.g., 'Feature' or 'MissingFeature'
    feature_description VARCHAR(255),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE header_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    bleaching_description TEXT,
    drying_description TEXT,
    ironing_description TEXT,
    FOREIGN KEY (product_id) REFERENCES products(id)
);
