<?php

$squeme = [
    'CREATE TABLE IF NOT EXISTS address('
    . ' id int(11) NOT NULL, '
    . ' client_id int(11) NOT NULL, '
    . ' address varchar(255) NOT NULL, '
    . ' is_billing tinyint(1) NOT NULL'
    . ' ) ',
    'CREATE TABLE IF NOT EXISTS clients('
    . ' id int(11) NOT NULL,'
    . ' name varchar(255) NOT NULL,'
    . ' type int(1) NOT NULL'
    . ' ) ',
    'CREATE TABLE IF NOT EXISTS pessoas_fisicas('
    . ' client_id int(11) NOT NULL, '
    . ' age int(11) NOT NULL, '
    . ' rg varchar(255) NOT NULL, '
    . ' cpf varchar(20) NOT NULL'
    . ' ) ',
    'CREATE TABLE IF NOT EXISTS pessoas_juridicas('
    . ' client_id int(11) NOT NULL, '
    . ' cnpj varchar(255) NOT NULL, '
    . ' inscricao varchar(20) NOT NULL'
    . ' ) ',
    'ALTER TABLE address ADD PRIMARY KEY (id), ADD KEY client_id(client_id)',
    'ALTER TABLE clients ADD PRIMARY KEY (id)',
    'ALTER TABLE pessoas_fisicas ADD PRIMARY KEY (client_id)',
    'ALTER TABLE pessoas_juridicas ADD PRIMARY KEY (client_id)',
    'ALTER TABLE address MODIFY id int(11) NOT NULL AUTO_INCREMENT',
    'ALTER TABLE clients MODIFY id int(11) NOT NULL AUTO_INCREMENT',
    'ALTER TABLE address ADD CONSTRAINT address_client_id FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE',
    'ALTER TABLE pessoas_fisicas ADD CONSTRAINT pessoas_fisicas_client_id FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE',
    'ALTER TABLE pessoas_juridicas ADD CONSTRAINT pessoas_jusridicas_client_id FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE'
];

