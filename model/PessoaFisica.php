<?php

/**
 * Description of PessoaFisica
 * @abstract This  object is responsible for handling the PessoaFisica's data.
 * @author Mario Henrique Meireles de Aquino
 */
class PessoaFisica extends Client implements Cobranca {

    private $cpf, $idade, $rg;

    public function getEnderecoDeCobranca() {
        return $this->props['endereco'];
    }

    public function getGrauDeImportancia() {        
        if ($this->props['idade'] > 40):
            return 'Cliente Platina';
        elseif ($this->props['idade'] > 30):
            return 'Cliente Ouro';
        endif;

        return 'Cliente Prata';
    }

    public function getEndereco() {

        return $this->props['endereco'];
    }

    private function setProps($data) {
        foreach ($data as $key => $value) :
            if (key_exists($key, $this->props)) :
                $this->props[$key] = $value;
            endif;
        endforeach;
    }

}
