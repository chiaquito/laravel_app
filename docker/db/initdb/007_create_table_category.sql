-- カテゴリテーブル
CREATE TABLE category (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    service_id INT NOT NULL,
    
    -- 外部キー制約
    CONSTRAINT fk_service
        FOREIGN KEY(service_id) 
        REFERENCES service(id)
);