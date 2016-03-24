<?php
namespace MyFramework;

class MessengerModel extends Core
{
	public $id_recipient;

	public function getUrl()
	{
		return $_SERVER['REQUEST_URI'];
	}

	public function getMessage($id_recipient)
	{	
		$this->id_recipient = $id_recipient;

		$request = 'SELECT messages.id_msg, messages.id_sender, messages.id_recipient,
		 messages.subject, messages.content, messages.date, members.id, members.pseudo
		  AS "expediteurLogin"  FROM messages, members WHERE messages.id_recipient = 
		  "' . $this->id_recipient . '" && messages.id_sender = members.id
		   ORDER BY date DESC';
		$data = Connexion::getConnexion()->request($request);
		return $data;
	}
	public function nbrMess($id_recipient)
	{
		$request = 'SELECT count(*) as "nbrMess" FROM messages WHERE 
		id_recipient = "' . $id_recipient . '"';
		$data = Connexion::getConnexion()->request($request);
		return $data;
	}
}
?>