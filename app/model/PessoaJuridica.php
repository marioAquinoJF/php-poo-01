<?php
namespace app\model;
use app\model\Cobranca;
/**
 * Description of PessoaJuridica
 * @abstract This  object is responsible for handling the PessoaJuridica's data.
 * @author Mario Henrique Meireles de Aquino
 */
class PessoaJuridica extends Client implements Cobranca {

    private $cnpj, $inscricao;

    public function construct($dataClient) {
        parent::__construct($dataClient);
    }

    public function getEnderecoDeCobranca() {
        return $this->props['endereco']['cobranca'];
    }

    public function getGrauDeImportancia() {
        if (strstr($this->getEnderecoDeCobranca(), "SP")):
            return 'Cliente Platina';
        elseif (strstr($this->getEnderecoDeCobranca(), "RJ")):
            return 'Cliente Ouro';
        endif;
        return 'Cliente Prata';
    }

    public function getEndereco() {
        return $this->props['endereco']['localizadaEm'];
    }



}
