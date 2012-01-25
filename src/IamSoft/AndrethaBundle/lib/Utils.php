<?php

namespace IamSoft\AndrethaBundle\lib;

class Utils
{
	/**
	 * 
	 * Obtiene la expresion que compara los campos pasados para verificar
	 * si hay solapamiento. 
	 * @param string $campoBDDesde
	 * @param string $campoBDHasta
	 * @param string $campoDesde
	 * @param string $campoHasta
	 */
	public static function getExpresionWhereSolapamiento($campoBDDesde,
		$campoBDHasta,$campoDesde,$campoHasta)
	{
		return 
    	'( ( '.$campoBDDesde.' <= '.$campoDesde.' and '.
    	$campoBDHasta.' >= '.$campoDesde.' ) or '.
    	'( '.$campoBDDesde.' <= '.$campoHasta.' and '.
    	$campoBDHasta.' >= '.$campoHasta.' ) or '.
    	'( '.$campoDesde.' <= '.$campoBDDesde.' and '.
    	$campoHasta.' >= '.$campoBDHasta.' ) )';
	}
	
	public static function getExpresionWhereDistintoId($campoIdBd,
		$campoParametro)
	{
		return 
    	'( '.$campoParametro.' is null or '.
    	$campoIdBd.' != '.$campoParametro.' )';		
	}
}