-- カスタマータイプ（マスターテーブル）
CREATE TABLE customer_type (
    id INT PRIMARY KEY,
    code INT NOT NULL, 
    name VARCHAR(50) NOT NULL         -- 表示名 (例: 登録店)
);
