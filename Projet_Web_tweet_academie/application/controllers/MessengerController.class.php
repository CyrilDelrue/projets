<?php
namespace MyFramework;

class MessengerController extends MessengerModel
{
	public $afficher;

	public function messengerAction()
	{
		$this->render(['url' => $this->getUrl(),'recipientMsg' => $this->messenger()]);
	}

	public function messenger()
	{
		if(!empty($_SESSION['id'])){
			$result = parent::getMessage($_SESSION['id']);
			$nbrMsg = parent::nbrMess($_SESSION['id']);	
			var_dump($result);

			if($nbrMsg[0]['nbrMess'] != 0){
				foreach ($result as $key => $value) {
					$this->afficher .= '<a href="index.php?page=messagerieController&amp;
					action=readMessage&amp;id_message='.  $value['id_msg'] .'"
					class="list-group-item">
					<div class="checkbox">
						<label>
							<input name="check_list[]" value="'.$value['id_msg'].'" type="checkbox">
						</label>
					</div><span class="glyphicon glyphicon-star-empty">
					</span><span class="name" style="min-width: 120px;display: inline-block;">' . $value['expediteurLogin'] . 
					'</span> <span class="">' . $value['subject'] . '</span>
					<span class="text-muted" style="font-size: 11px;">' .
					$value['content'] . '</span> <spanclass="badge">' .
					$value['date'] . '</span> <span class="pull-right">
					<span class="glyphicon glyphicon-paperclip">
					</span></span></a><a href="#" class="list-group-item">';
				}
			}
		}    
	}


} 







?>