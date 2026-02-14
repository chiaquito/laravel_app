-- ユーザーテーブル
CREATE TABLE user (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    customer_type_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    -- 外部キー制約
    CONSTRAINT fk_customer_type
        FOREIGN KEY(customer_type_id) 
        REFERENCES customer_type(id)
);