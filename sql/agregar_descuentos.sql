SELECT 
p.model,
p.price,
p.product_id,
1 AS customer_group_id,
1 AS quantity,
1 AS priority,
(p.price - (p.price*0.2)) AS price,
'2019-01-01' as date_start,
'2020-01-01' as date_end
FROM product p
WHERE not exists(SELECT 1 FROM product_discount pd WHERE pd.product_id = p.product_id);

INSERT INTO product_discount(product_id,customer_group_id,quantity,priority,price,date_start,date_end)
SELECT
p.product_id,
1 AS customer_group_id,
1 AS quantity,
1 AS priority,
(p.price - (p.price*0.2)) AS price,
'2019-01-01' as date_start,
'2020-01-01' as date_end
FROM product p
WHERE not exists(SELECT 1 FROM product_discount pd WHERE pd.product_id = p.product_id);

UPDATE
product_discount
INNER JOIN product p ON p.product_id = product_discount.product_id
SET product_discount.price = (p.price - (p.price*0.2));
