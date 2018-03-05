<?php
	session_start();
	include_once('../../settings/settings.php');

	$idOf = $actualUser;
	$idFor = $_SESSION['idFor'];


	$emotions = array(":angry:", ":angry1:", ":bored:", ":bored1:", ":bored2:", ":confused:", ":confused1:", ":crying:", ":crying1:", ":embarrassed:", ":emoticons:", ":happy:", ":happy1:", ":happy2:", ":happy3:", ":happy4:", ":ill:", ":inlove:", ":kissing:", ":mad:", ":nerd:", ":ninja:", ":quiet:", ":sad:", ":secret:", ":smart:", ":smyle:", ":smiling:", ":surprised:", ":surprised1:", ":suspicious:", ":suspiciou1:", ":tongueout:", ":tongueout1:", ":unhappy:", ":wink:");
        $images = array("<img src=\"img/emoticons/angry.png\" class=\"emoticons-size\" title=\":angry:\">", 
                "<img src=\"img/emoticons/angry-1.png\" class=\"emoticons-size\" title=\":angry1:\">", 
                "<img src=\"img/emoticons/bored.png\" class=\"emoticons-size\" title=\":bored:\">", 
                "<img src=\"img/emoticons/bored-1.png\" class=\"emoticons-size\" title=\":bored1:\">", 
                "<img src=\"img/emoticons/bored-2.png\" class=\"emoticons-size\" title=\":bored2:\">", 
                "<img src=\"img/emoticons/confused.png\" class=\"emoticons-size\" title=\":confused:\">", 
                "<img src=\"img/emoticons/confused-1.png\" class=\"emoticons-size\" title=\":confused1:\">", 
                "<img src=\"img/emoticons/crying.png\" class=\"emoticons-size\" title=\":crying:\">", 
                "<img src=\"img/emoticons/crying-1.png\" class=\"emoticons-size\" title=\":crying1:\">", 
                "<img src=\"img/emoticons/embarrassed.png\" class=\"emoticons-size\" title=\":embarrassed:\">", 
                "<img src=\"img/emoticons/emoticons.png\" class=\"emoticons-size\" title=\":emoticons:\">", 
                "<img src=\"img/emoticons/happy.png\" class=\"emoticons-size\" title=\":happy:\">", 
                "<img src=\"img/emoticons/happy-1.png\" class=\"emoticons-size\" title=\":happy1:\">", 
                "<img src=\"img/emoticons/happy-2.png\" class=\"emoticons-size\" title=\":happy2:\">", 
                "<img src=\"img/emoticons/happy-3.png\" class=\"emoticons-size\" title=\":happy3:\">", 
                "<img src=\"img/emoticons/happy-4.png\" class=\"emoticons-size\" title=\":happy4:\">", 
                "<img src=\"img/emoticons/ill.png\" class=\"emoticons-size\" title=\":ill:\">", 
                "<img src=\"img/emoticons/in-love.png\" class=\"emoticons-size\" title=\":inlove:\">", 
                "<img src=\"img/emoticons/kissing.png\" class=\"emoticons-size\" title=\":kissing:\">", 
                "<img src=\"img/emoticons/mad.png\" class=\"emoticons-size\" title=\":mad:\">", 
                "<img src=\"img/emoticons/nerd.png\" class=\"emoticons-size\" title=\":nerd:\">", 
                "<img src=\"img/emoticons/ninja.png\" class=\"emoticons-size\" title=\":minja:\">", 
                "<img src=\"img/emoticons/quiet.png\" class=\"emoticons-size\" title=\":quiet:\">", 
                "<img src=\"img/emoticons/sad.png\" class=\"emoticons-size\" title=\":sad:\">", 
                "<img src=\"img/emoticons/secret.png\" class=\"emoticons-size\" title=\":secret:\">", 
                "<img src=\"img/emoticons/smart.png\" class=\"emoticons-size\" title=\":smart:\">", 
                "<img src=\"img/emoticons/smile.png\" class=\"emoticons-size\" title=\":smile:\">", 
                "<img src=\"img/emoticons/smiling.png\" class=\"emoticons-size\" title=\":smiling:\">", 
                "<img src=\"img/emoticons/surprised.png\" class=\"emoticons-size\" title=\":surprised:\">", 
                "<img src=\"img/emoticons/surprised-1.png\" class=\"emoticons-size\" title=\":surprised1:\">", 
                "<img src=\"img/emoticons/suspicious.png\" class=\"emoticons-size\" title=\":suspicious:\">", 
                "<img src=\"img/emoticons/suspicious-1.png\" class=\"emoticons-size\" title=\":suspicious1:\">", 
                "<img src=\"img/emoticons/tongue-out.png\" class=\"emoticons-size\" title=\":tongueout:\">", 
                "<img src=\"img/emoticons/tongue-out-1.png\" class=\"emoticons-size\" title=\":tongueout1:\">", 
                "<img src=\"img/emoticons/unhappy.png\" class=\"emoticons-size\" title=\":unhappy:\">", 
                "<img src=\"img/emoticons/wink.png\" class=\"emoticons-size\" title=\":wink:\">");

    $query = "SELECT * FROM (SELECT * FROM messages WHERE (id_de = :id_de AND id_para = :id_para) OR (id_de = :id_para AND id_para = :id_de) ORDER BY id DESC LIMIT 10) sub ORDER BY id ASC";

    $select = $conn->prepare($query);
    $select->bindValue(':id_de', $idOf);
    $select->bindValue(':id_para', $idFor);
    $select->execute();

    $result = $select->fetchAll(PDO::FETCH_OBJ);

    if($result == null) {
       	echo "<code>A conversa não vai se iniciar sozinha... Por que não começa dizendo um Oi?</code>";
       }
	else {
		foreach ($result as $key => $value) {
			$value->message = str_replace($emotions, $images, $value->message);


	?>

    <?php if($value->id_de == $idOf) { ?>

	   	<div align="right">
	   		<p class="chat-i"><?= $value->message; ?></p>
	   	</div>

    <?php } else if($value->id_de != $idOf) { ?>

	   	<div align="left">
	   		<p class="chat-you"><?= $value->message; ?></p>
	   	</div>

	<?php }}} ?>