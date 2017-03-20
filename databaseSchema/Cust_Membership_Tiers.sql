INSERT INTO cust_membership_tiers (tier_name, validity_period, 
    min_spending, membership_fee, membership_pts, redemption_pts, 
    discount_rate, birthday_rate, description)
VALUES ('Bronze', 365, 50, 5, 5, 20, '2%', '5%', 'Bronze Tier');

INSERT INTO cust_membership_tiers (tier_name, validity_period, 
    min_spending, membership_fee, membership_pts, redemption_pts, 
    discount_rate, birthday_rate, description)
VALUES ('Silver', 365, 100, 5, 7, 20, '3%', '7%', 'Silver Tier');

INSERT INTO cust_membership_tiers (tier_name, validity_period, 
    min_spending, membership_fee, membership_pts, redemption_pts, 
    discount_rate, birthday_rate, description)
VALUES ('Gold', 365, 150, 5, 9, 20, '4%', '9%', 'Gold Tier');