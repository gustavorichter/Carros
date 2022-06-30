<?php

namespace App\Entity;

use \App\Banco\Database;
use \PDO;

class Carro
{

	/**
	 * @var integer
	 */
	public $id;

	/**
	 * @var string
	 */
	public $descricao;

	/**
	 * @var string
	 */
	public $placa;

	/**
	 * @var string
	 */
	public $codRenavam;

	/**
	 * @var string
	 */
	public $anoModelo;
	/**
	 * @var string
	 */
	public $anoFabricacao;

	/**
	 * @var string
	 */
	public $cor;

	/**
	 * @var string
	 */
	public $km;

	/**
	 * @var string
	 */
	public $marca;

	/**
	 * @var string
	 */
	public $preco;

	/**
	 * @var string
	 */
	public $precoFipe;

	/**
	 * @return boolean
	 */
	public function cadastrar()
	{
		$obDatabase = new Database('carros');
		$this->id = $obDatabase->insert([
			'descricao' => $this->descricao,
			'placa' => $this->placa,
			'codRenavam' => $this->codRenavam,
			'anoModelo' => $this->anoModelo,
			'anoFabricacao' => $this->anoFabricacao,
			'cor' => $this->cor,
			'km' => $this->km,
			'marca' => $this->marca,
			'preco' => $this->preco,
			'precoFipe' => $this->precoFipe
		]);

		return true;
	}

	/**
	 * @return boolean
	 */
	public function atualizar()
	{
		return (new Database('carros'))->update('id = ' . $this->id, [
			'descricao' => $this->descricao,
			'placa' => $this->placa,
			'codRenavam' => $this->codRenavam,
			'anoModelo' => $this->anoModelo,
			'anoFabricacao' => $this->anoFabricacao,
			'cor' => $this->cor,
			'km' => $this->km,
			'marca' => $this->marca,
			'preco' => $this->preco,
			'precoFipe' => $this->precoFipe
		]);
	}

	/**
	 * @return boolean
	 */
	public function remover()
	{
		return (new Database('carros'))->delete('id = ' . $this->id);
	}

	/**
	 * @param  string $where
	 * @param  string $order
	 * @param  string $limit
	 * @return array
	 */
	public static function getCarros($where = null, $order = null, $limit = null){
		return (new Database('carros'))->select($where, $order, $limit)
			->fetchAll(PDO::FETCH_CLASS, self::class);
	}

	/**
	 * @param strinf
	 * @return integer
	 */

	public static function getQuantidadeCarros($where = null){
		return (new Database('carros'))->select($where,null,null,'COUNT(*) as qtd')
			->fetchObject()
			->qtd;
	}

	/**
	 * @param  integer $id
	 * @return Carro
	 */
	public static function getCarro($id)
	{
		return (new Database('carros'))->select('id = ' . $id)
			->fetchObject(self::class);
	}
}
