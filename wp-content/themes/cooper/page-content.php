<?php
/*
Template Name: Page Content
*/
?>
<?php get_header(); ?>

<section class="section-content" data-aos="fade-up">
	<div class="container">
		<div class="section-header" data-aos="fade-up">
			<h1 class="section-header__title"><?php the_title(); ?></h1>
		</div>
		<div class="content">
			<?php the_content(); ?>
			<!-- <p><b>Datenschutzerklärung</b></p>
			<p><b>Allgemeine Hinweise</b></p>
			<p>Die folgenden Hinweise geben einen einfachen Überblick darüber, was mit Ihren personenbezogenen Daten passiert,
				wenn Sie unsere Website besuchen. Personenbezogene Daten sind alle Daten, mit denen Sie persönlich identifiziert
				werden können. Ausführliche Informationen zum Thema Datenschutz entnehmen Sie unserer unter diesem Text
				aufgeführten Datenschutzerklärung.</p>
			<p><b>1. Hinweis zur verantwortlichen Stelle</b></p>
			<p>Die verantwortliche Stelle für die Datenverarbeitung auf dieser Website ist:</p>
			<p>
				Cooper Immobilien ist eine Marke der<br>
				Cooper Growth AG<br>
				Vorstand: Herr Oliver Wydwaldt<br>
				Am Kaiserkai 62, 20457 Hamburg<br>
				Telefon: +49 (0) 40 228 643 43-0<br>
				E-Mail: <a href="mailto:info@cooper-immobilien.com">info@cooper-immobilien.com</a><br>
				Verantwortliche Stelle ist die natürliche oder juristische Person, die allein oder gemeinsam mit anderen über
				die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten (z. B. Namen, E-Mail-Adressen o. Ä.)
				entscheidet.
			</p>
			<p><b>2. Datenschutzbeauftragter</b></p>
			<p>Unseren Datenschutzbeauftragten erreichen Sie unter Datenschutz@cooper-immobilien.com</p>
			<p><b>3. Welche Rechte haben Sie bezüglich Ihrer Daten?</b></p>
			<p>Sie haben jederzeit das Recht unentgeltlich Auskunft über Herkunft, Empfänger und Zweck Ihrer gespeicherten
				personenbezogenen Daten zu erhalten. Sie haben außerdem ein Recht, die Berichtigung, Sperrung oder Löschung
				dieser Daten zu verlangen. Hierzu sowie zu weiteren Fragen zum Thema Datenschutz können Sie sich jederzeit unter
				der im Impressum angegebenen Adresse an uns wenden. Des Weiteren steht Ihnen ein Beschwerderecht bei der
				zuständigen Aufsichtsbehörde zu.</p>
			<p>Außerdem haben Sie das Recht, unter bestimmten Umständen die Einschränkung der Verarbeitung Ihrer
				personenbezogenen Daten zu verlangen.</p>
			<p><b>3.1 Rechte bei der Datenverarbeitung nach dem berechtigten Interesse</b></p>
			<p>Sie haben gem. Art. 21 Abs. 1 DSGVO das Recht, aus Gründen, die sich aus ihrer besonderen Situation ergeben,
				jederzeit gegen die Verarbeitung sie betreffender personenbezogener Daten, die aufgrund von Art. 6 Abs. 1 lit.
				e) DSGVO (Datenverarbeitung im öffentlichen Interesse) oder aufgrund Artikel 6 Abs. 1 lit. f) DSGVO
				(Datenverarbeitung zur Wahrung eines berechtigten Interesses) erfolgt, Widerspruch einzulegen, dies gilt auch
				für ein auf diese Vorschrift gestütztes Profiling. Im Falle Ihres Widerspruchs verarbeiten wir Ihre
				personenbezogenen Daten nicht mehr, es sei denn, wir können zwingende schutzwürdige Gründe für die Verarbeitung
				nachweisen, die Ihre Interessen, Rechte und Freiheiten überwiegen, oder die Verarbeitung dient der
				Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen.</p>
			<p><b>3.2 Rechte bei Direktwerbung</b></p>
			<p>Sofern wir Ihre personenbezogenen Daten verarbeiten, um Direktwerbung zu betreiben, so haben Sie gem. Art. 21
				Abs. 2 DSGVO das Recht, jederzeit Widerspruch gegen die Verarbeitung der Sie betreffenden personenbezogenen
				Daten zum Zwecke derartiger Werbung einzulegen, dies gilt auch für das Profiling, soweit es mit solcher
				Direktwerbung in Verbindung steht.</p>
			<p>Im Falle Ihres Widerspruchs gegen die Verarbeitung zum Zwecke der Direktwerbung werden wir Ihre
				personenbezogenen Daten nicht mehr für diese Zwecke verarbeiten</p>
			<p><b>4. Datenerfassung auf unserer Website</b></p>
			<p><b>4.1 Server-Log-Dateien</b></p>
			<p>Der Provider der Seiten erhebt und speichert automatisch Informationen in so genannten Server-Log-Dateien, die
				Ihr Browser automatisch an uns übermittelt, wenn Sie unserer Seite besuchen. Dies sind:</p>
			<ul>
				<li>Browsertyp und Browserversion</li>
				<li>verwendetes Betriebssystem</li>
				<li>Referrer URL</li>
				<li>Hostname des zugreifenden Rechners</li>
				<li>Uhrzeit der Serveranfrage</li>
				<li>IP-Adresse</li>
			</ul>
			<p>Eine Zusammenführung dieser Daten mit anderen Datenquellen wird nicht vorgenommen.</p>
			<p>Die Erfassung dieser Daten erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Der Websitebetreiber hat ein
				berechtigtes Interesse an der technisch fehlerfreien Darstellung und der Optimierung seiner Website – hierzu
				müssen die Server-Log-Files erfasst werden. Wir verarbeiten Ihre personenbezogenen Daten nur in dem jeweils
				erforderlichen Umfang. Werden die erhobenen Daten zu den genannten Zwecken nicht mehr benötigt, so werden diese
				gelöscht. Bei Logfiles ist dies der Fall, wenn Ihre jeweilige Sitzung beendet ist.</p>
			<p><b>4.2 Anfrage per E-Mail oder Kontaktformular</b></p>
			<p>Bei Ihrer Kontaktaufnahme mit uns per E-Mail oder über ein Kontaktformular werden die von Ihnen mitgeteilten
				Daten (Ihre E-Mail-Adresse, ggf. Ihr Name und Ihre Telefonnummer) von uns gespeichert, um Ihre Fragen zu
				beantworten und Ihre Anliegen zu bearbeiten. Rechtsgrundlage ist insoweit Art. 6 Abs. 1 S. 1 lit. f DSGVO.
				Soweit wir über unser Kontaktformular Eingaben abfragen, die nicht für eine Kontaktaufnahme erforderlich sind,
				haben wir diese stets als optional gekennzeichnet. Diese Angaben dienen uns zur Konkretisierung Ihrer Anfrage
				und zur verbesserten Abwicklung Ihres Anliegens. Eine Mitteilung dieser Angaben erfolgt ausdrücklich auf
				freiwilliger Basis und mit Ihrer Einwilligung, Art. 6 Abs.1 lit. a DSGVO. Soweit es sich hierbei um Angaben zu
				Kommunikationskanälen (beispielsweise E-Mail-Adresse, Telefonnummer) handelt, willigen Sie außerdem ein, dass
				wir Sie ggf. auch über diesen Kommunikationskanal kontaktieren, um Ihr Anliegen zu beantworten. Diese
				Einwilligung können Sie selbstverständlich jederzeit für die Zukunft widerrufen.</p>
			<p>Ihre Daten, die wir im Rahmen der Kontaktaufnahme erhalten haben, werden gelöscht, sobald sie für die
				Erreichung des Zwecks ihrer Erhebung nicht mehr benötigt werden, Ihr Anliegen vollständig bearbeitet und keine
				weitere Kommunikation mit Ihnen erforderlich oder von ihnen gewünscht ist.</p>
			<p><b>4.3 Newsletter</b></p>
			<p>Mit Ihrer Einwilligung nach Art. 6 Abs. 1 lit. a DSGVO können Sie unseren Newsletter abonnieren, mit dem wir
				Sie über unsere aktuellen Angebote informieren.</p>
			<p>Für die Anmeldung zu unserem Newsletter verwenden wir das sog. Double-Opt-in-Verfahren. Das heißt, dass wir
				Ihnen nach Ihrer Anmeldung eine E-Mail an die angegebene E-Mail-Adresse senden, in welcher wir Sie um
				Bestätigung bitten, dass Sie den Versand des Newsletters wünschen. Wenn Sie Ihre Anmeldung nicht innerhalb von
				24 Stunden bestätigen, werden Ihre Informationen gesperrt und nach einem Monat automatisch gelöscht.</p>
			<p>Darüber hinaus speichern wir jeweils Ihre eingesetzten IP-Adressen und Zeitpunkte der Anmeldung und
				Bestätigung. Zweck des Verfahrens ist, Ihre Anmeldung nachweisen und ggf. einen möglichen Missbrauch Ihrer
				persönlichen Daten aufklären zu können.</p>
			<p>Sofern wir Ihre Einwilligung zu personalisierten Informationen erhalten haben, werden wir Ihr Nutzerverhalten
				auf unserer Internetpräsenz sowie innerhalb der von uns versendeten Newsletter auswerten und Ihrem bei uns
				geführtem Nutzerprofil zuordnen. Wir speichern weiterhin Informationen über verwendete Devices, Öffnungs-,
				Klick- & Leseverhalten in E-Mails, sowie Themen-Bereiche, die innerhalb der Internetpräsenz besucht worden sind.
			</p>
			<p>Pflichtangabe für die Übersendung des Newsletters ist allein Ihre E-Mail-Adresse. Nach Ihrer Bestätigung
				speichern wir Ihre E-Mail-Adresse zum Zweck der Zusendung des Newsletters. Rechtsgrundlage ist Art. 6 Abs. 1
				lit. a) DSGVO.</p>
			<p>Ihre Einwilligung in die Übersendung des Newsletters können Sie jederzeit widerrufen und den Newsletter
				abbestellen. Den Widerruf können Sie durch Klick auf den in jeder Newsletter-E-Mail bereitgestellten Link oder
				per Kontaktanfrage an den oben angegebenen Datenschutzbeauftragten erklären.</p>
			<p><b>4.4 Verarbeiten von Daten (Kunden- und Vertragsdaten)</b></p>
			<p>
				Wir erheben, verarbeiten und nutzen personenbezogene Daten nur, soweit sie für die Begründung, inhaltliche
				Ausgestaltung oder Änderung des Vermittlungsverhältnisses erforderlich sind. Dies erfolgt auf Grundlage von Art.
				6 Abs. 1 lit. b) DSGVO, der die Verarbeitung von Daten zur Erfüllung eines Vertrags oder vorvertraglicher
				Maßnahmen gestattet.
				Dies beinhaltet insbesondere auch die ggf. notwendige Weitergabe Ihrer Daten an unsere Partner zum Zwecke der
				Erfüllung unserer vertraglichen Verpflichtungen Ihnen gegenüber. ZB. im Rahmen beauftragter Bewertungen Ihrer
				Immobilie übernehmen wir das nicht selbst, sondern zuverlässige Partner, die zu diesem Zweck mit uns
				zusammenarbeiten.
				Die erhobenen Kundendaten werden nach Abschluss des Auftrags oder Beendigung der Geschäftsbeziehung gelöscht.
				Gesetzliche Aufbewahrungsfristen bleiben unberührt.
			</p>
			<p><b>4.5 Registrierung</b></p>
			<p>Auf unserer Internetseite bieten wir Nutzern die Möglichkeit, sich unter Angabe personenbezogener Daten zu
				registrieren. Die Daten werden dabei in eine Eingabemaske eingegeben und an uns übermittelt und gespeichert.
				Eine Weitergabe der Daten an Dritte findet nicht statt. Folgende Daten werden im Rahmen des
				Registrierungsprozesses erhoben:</p>
			<p>
				(1) Anrede<br>
				(2) Name<br>
				(3) E-Mailadresse<br>
				(4) Telefonnummer<br>
			</p>
			<p>Im Zeitpunkt der Registrierung werden zudem folgende Daten gespeichert:</p>
			<p>
				(1) die IP-Adresse des Nutzers<br>
				(2) Datum und Uhrzeit der Registrierung<br>
			</p>
			<p>Im Rahmen des Registrierungsprozesses wird eine Einwilligung des Nutzers zur Verarbeitung dieser Daten
				eingeholt.</p>
			<p>
				Rechtsgrundlage für die Verarbeitung der Daten ist bei Vorliegen einer Einwilligung des Nutzers Art. 6 Abs. 1
				lit. a DSGVO.
				Dient die Registrierung der Erfüllung eines Vertrages, dessen Vertragspartei der Nutzer ist oder der
				Durchführung vorvertraglicher Maßnahmen, so ist zusätzliche Rechtsgrundlage für die Verarbeitung der Daten Art.
				6 Abs. 1 lit. b DSGVO.
			</p>
			<p>
				Die Daten werden gelöscht, sobald sie für die Erreichung des Zweckes ihrer Erhebung nicht mehr erforderlich
				sind.
				Dies ist für die während des Registrierungsvorgangs zur Erfüllung eines Vertrags oder zur Durchführung
				vorvertraglicher Maßnahmen dann der Fall, wenn die Daten für die Durchführung des Vertrages nicht mehr
				erforderlich sind. Auch nach Abschluss des Vertrags kann eine Erforderlichkeit, personenbezogene Daten des
				Vertragspartners zu speichern, bestehen, um vertraglichen oder gesetzlichen Verpflichtungen nachzukommen.
			</p>
			<p>Sind die Daten zur Erfüllung eines Vertrages oder zur Durchführung vorvertraglicher Maßnahmen erforderlich, ist
				eine vorzeitige Löschung der Daten nur möglich, soweit nicht vertragliche oder gesetzliche Verpflichtungen einer
				Löschung entgegenstehen.</p>
			<p>Sofern das auf den neuen Websites auch der Fall sein sollte, muss hier ebenfalls dieser Hinweis hinzugefügt
				werden.</p>
			<p><b>5. Verwendung von Cookies</b></p>
			<p>Die Internetseiten verwenden teilweise so genannte Cookies. Cookies richten auf Ihrem Rechner keinen Schaden an
				und enthalten keine Viren. Cookies dienen dazu, unser Angebot nutzerfreundlicher, effektiver und sicherer zu
				machen. Cookies sind kleine Textdateien, die auf Ihrem Rechner abgelegt werden und die Ihr Browser speichert.
			</p>
			<p>Die meisten der von uns verwendeten Cookies sind so genannte „Session-Cookies“. Sie werden nach Ende Ihres
				Besuchs automatisch gelöscht. In Session-Cookies werden dabei im wesentlichen folgende Daten gespeichert und
				übermittelt:</p>
			<ul>
				<li>Spracheinstellungen</li>
				<li>Log-In-Informationen</li>
				<li>Besucher-ID</li>
				<li>Zeitstempel mit Start und Ende der aktuellen Session.</li>
			</ul>
			<p>Andere Cookies bleiben auf Ihrem Endgerät gespeichert bis Sie diese löschen. Diese Cookies ermöglichen es uns,
				Ihren Browser beim nächsten Besuch wiederzuerkennen. Diese Cookies werden nach einer voreingestellten
				Zeitspanne, die sich je nach Cookie unterscheidet, automatisch von ihrem System gelöscht.</p>
			<p>Sie können Ihren Browser so einstellen, dass Sie über das Setzen von Cookies informiert werden und Cookies nur
				im Einzelfall erlauben, die Annahme von Cookies für bestimmte Fälle oder generell ausschließen sowie das
				automatische Löschen der Cookies beim Schließen des Browsers aktivieren. Bei der Deaktivierung von Cookies kann
				die Funktionalität dieser Website eingeschränkt sein.</p>
			<p>
				Cookies, die zur Durchführung des elektronischen Kommunikationsvorgangs oder zur Bereitstellung bestimmter, von
				Ihnen erwünschter Funktionen erforderlich sind, werden auf Grundlage von Art. 6 Abs. 1 lit. f) DSGVO
				gespeichert. Der Websitebetreiber hat ein berechtigtes Interesse an der Speicherung von Cookies zur technisch
				fehlerfreien und optimierten Bereitstellung seiner Dienste. Soweit andere Cookies (z. B. Cookies zur Analyse
				Ihres Surfverhaltens) gespeichert werden, werden diese in dieser Datenschutzerklärung gesondert behandelt.
				Beim Aufruf unserer Website werden die Nutzer durch einen Infobanner über die Verwendung von Cookies zu
				informiert und auf diese Datenschutzerklärung verwiesen. Es erfolgt in diesem Zusammenhang auch ein Hinweis
				darauf, wie die Speicherung von Cookies in den Browsereinstellungen unterbunden werden kann. Außerdem wird Ihre
				vorherige Einwilligung zur Nutzung nicht technisch notwendiger Cookies eingeholt.
			</p>
			<p><b>6. Trackingtechnologien</b></p>
			<p><b>6.1 Google Analytics</b></p>
			<p>Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc, (1600 Amphitheatre Parkway
				Mountain View, CA 94043, USA) Die Nutzung umfasst die Betriebsart Universal Analytics. Hierdurch ist es möglich,
				Daten, Sitzungen und Interaktionen über mehrere Geräte hinweg einer pseudonymen User-ID zuzuordnen und so die
				Aktivitäten eines Nutzers geräteübergreifend zu analysieren.</p>
			<p>
				Google Analytics verwendet Cookies, die eine Analyse der Benutzung der Website durch Sie ermöglichen. Die durch
				das Cookie erzeugten Informationen über Ihre Benutzung dieser Website werden in der Regel an einen Server von
				Google in den USA übertragen und dort gespeichert. Im Falle der Aktivierung der IP-Anonymisierung auf dieser
				Website, wird Ihre IP-Adresse von Google jedoch innerhalb von Mitgliedstaaten der Europäischen Union oder in
				anderen Vertragsstaaten des Abkommens über den Europäischen Wirtschaftsraum zuvor gekürzt. Nur in Ausnahmefällen
				wird die volle IP-Adresse an einen Server von Google in den USA übertragen und dort gekürzt. Die im Rahmen von
				Google Analytics von Ihrem Browser übermittelte IP-Adresse wird nicht mit anderen Daten von Google
				zusammengeführt. Im Auftrag des Betreibers dieser Website wird Google diese Informationen benutzen, um Ihre
				Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten zusammenzustellen und um weitere mit der
				Websitenutzung und der Internetnutzung verbundene Dienstleistungen gegenüber dem Websitebetreiber zu erbringen.
				Die Hauptkomponente, die das Surfverhalten der Benutzer verknüpft, ist die Client-ID, und ein Cookie wird
				verwendet, um diese Client-ID zu speichern und von Seite zu Seite weiterzuleiten. Wir verhindern, dass Google
				Analytics diese Client-ID in einem Cookie speichert. Wir tun dies, indem wir ein Skript in einem
				Tag-Management-System (wie Google Tag Manager) verwenden, das bei jedem Entladen einer Seite eine neue und
				zufällige Client-ID generiert. Dadurch wird der Benutzer effektiv vollständig anonym (wie gewünscht), ermöglicht
				uns aber dennoch, die Interaktionen auf der Website zu sehen.
				Es werden dadurch nur Daten auf Trefferebene wie die Gesamtzahl der Seitenaufrufe und die Gesamtzahl der
				Ereignisse genau gemeldet. Das bedeutet, dass Metriken, die auf Daten auf Sitzungs- oder Benutzerebene basieren
				(wie Absprungrate, Sitzungsdauer, Zeit auf der Seite, Einstiege oder Ausstiege), alle ungenau sind. Alle
				normalen Metriken werden jedoch weiterhin ausgefüllt, sodass Benutzer- und Sitzungsmetriken weiterhin angezeigt
				werden, aber sie sind nicht genau und können keinem Benutzer zugeordnet werden.
				Die Löschung von Daten, deren Aufbewahrungsdauer erreicht ist, erfolgt automatisch einmal im Monat. Nähere
				Informationen zu Nutzungsbedingungen und Datenschutz finden Sie unter
				https://www.google.com/analytics/terms/de.html bzw. unter https://policies.google.com/?hl=de
			</p>
			<p><b>6.2 Facebook Custom Audiences / Facebook Pixel</b></p>
			<p>Wir nutzen im Rahmen der nutzungsbasierten Onlinewerbung den Dienst Custom Audiences der Facebook Inc. (1601 S.
				California Avenue, Palo Alto, CA 94304, USA). Zu diesem Zweck legen wir im Facebook-Werbeanzeigenmanager
				Zielgruppen von Nutzern auf Basis bestimmter Merkmale fest, die nachfolgend Werbeanzeigen innerhalb des
				Facebook-Netzwerks angezeigt bekommen. Die Nutzer werden von Facebook anhand der von ihnen angegebenen
				Profilinformationen sowie sonstigen durch die Benutzung von Facebook bereitgestellten Daten ausgewählt. Klickt
				ein Nutzer auf eine Werbeanzeige und gelangt anschließend auf unsere Website, erhält Facebook über das auf
				unserer Website eingebundene Facebook-Pixel die Information, dass der Nutzer auf das Werbebanner geklickt hat.
			</p>
			<p>Grundsätzlich wird dabei eine nicht-reversible und nicht-personenbezogene Prüfsumme (Hash-Wert) aus Ihren
				Nutzungsdaten generiert, die an Facebook zu Analyse-und Marketingzwecken übermittelt wird. Dabei wird ein
				Facebook-Cookie gesetzt. Dieses Cookie erfasst Informationen über Ihre Aktivitäten auf unserer Webseite (z.B.
				Surfverhalten, besuchte Unterseiten, etc.). Zur geografischen Aussteuerung von Werbung wird zudem Ihre
				IP-Adresse gespeichert und verwendet.</p>
			<p>Facebook Custom Audiences über die Kundenliste wird ebenso wie die Funktion „erweiterter Abgleich“ nicht von
				uns genutzt.</p>
			<p>Weitere Informationen über Zweck und Umfang der Datenerhebung und die weitere Verarbeitung und Nutzung der
				Daten durch Facebook sowie Ihre Einstellungsmöglichkeiten zum Schutz Ihrer Privatsphäre, können Sie den
				Datenschutzrichtlinien von Facebook entnehmen. Einstellungen dazu, welche Werbeanzeigen Ihnen auf Facebook
				angezeigt werden, können Sie unter diesem Link sowie in den Kontoeinstellungen von Facebook vornehmen.</p>
			<p>Die Übermittlung von Daten in die USA ist nach Art. 45 DSGVO zulässig, da Facebook Privacy Shield-zertifiziert
				ist und somit nach dem Durchführungsbeschluss der Kommission(EU) 2016/1250(<a
					href="https://eur-lex.europa.eu/legal-content/DE/TXT/HTML/?uri=CELEX:32016D1250&from=DE">https://eur-lex.europa.eu/legal-content/DE/TXT/HTML/?uri=CELEX:32016D1250&from=DE</a>)
				ein angemessenes Datenschutzniveau besteht. Die Zertifizierung kann unter <a
					href="https://www.privacyshield.gov/participant?id=a2zt0000000GnywAAC&status=Active">https://www.privacyshield.gov/participant?id=a2zt0000000GnywAAC&status=Active</a>
				eingesehen werden.</p>
			<p>
				Weitere Informationen zu dem Dienst Custom Audiences von Facebook finden sie unter:
				<a
					href="https://de-de.facebook.com/business/help/449542958510885">https://de-de.facebook.com/business/help/449542958510885</a>.
			</p>
			<p>
				Weitere Informationen zur Datenverarbeitung und Speicherdauer erhalten sie bei dem Anbieter oder unter
				<a href="https://www.facebook.com/about/privacy">https://www.facebook.com/about/privacy</a>.
			</p>
			<p>
				Die Deaktivierung der Funktion „Facebook Custom Audiences“ ist für eingeloggte Nutzer unter
				<a href="">https://www.facebook.com/settings/?tab=ads#_ möglich</a>.
			</p>
			<p>Sie können die Speicherung von Cookies zudem durch eine entsprechende Einstellung Ihrer Browser-Software
				insgesamt verhindern. Wir weisen jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche
				Funktionen unserer Webseite vollumfänglich werden nutzen können. Weitere Möglichkeiten zur Deaktivierung von
				Cookies durch Drittanbieter finden Sie unter www.networkadvertising.org/managing/opt_out.asp oder Digital
				Advertising Alliance Opt-Out Plattform.</p>
			<p><b>6.3 Google Web Fonts</b></p>
			<p>Diese Seite nutzt zur einheitlichen Darstellung von Schriftarten so genannte Web Fonts, die von Google
				bereitgestellt werden. Beim Aufruf einer Seite lädt Ihr Browser die benötigten Web Fonts in ihren Browsercache,
				um Texte und Schriftarten korrekt anzuzeigen. Wir haben uns für die offline-Variante entschieden, bei der die
				Google Fonts lokal auf unseren Webserver gespeichert werden. Die Verwaltung der Fonts ist dann – mittels CSS –
				wie bei jeder anderen Font-Family möglich. Eine Übertragung der IP-Adresse und weiterer Daten an Google findet
				nicht statt.</p>
			<p>Die Nutzung von Google Web Fonts erfolgt im Interesse einer einheitlichen und ansprechenden Darstellung unserer
				Online-Angebote mit Hinblick der Effizienz- und Kosteneinsparungserwägungen. Dies stellt ein berechtigtes
				Interesse im Sinne von Art. 6 Abs. 1 lit. f) DSGVO dar. Wenn Ihr Browser Web Fonts nicht unterstützt, wird eine
				Standardschrift von Ihrem Computer genutzt.</p>
			<p>Weitere Informationen zu Google Web Fonts finden Sie unter <a
					href="https://developers.google.com/fonts/faq">https://developers.google.com/fonts/faq</a> und in der
				Datenschutzerklärung von Google: <a
					href="https://www.google.com/policies/privacy/">https://www.google.com/policies/privacy/</a></p>
			<p><b>6.4 Campain Manager (ehemals DoubleClick by Google)</b></p>
			<p>Diese Webseite nutzt das Online Marketing Tool Campaign Manager von Google. Campaign Manager setzt Cookies ein,
				um für die Nutzer relevante Anzeigen zu schalten, die Berichte zur Kampagnenleistung zu verbessern oder um zu
				vermeiden, dass ein Nutzer die gleichen Anzeigen mehrmals sieht. Über eine Cookie-ID erfasst Google, welche
				Anzeigen in welchem Browser geschaltet werden und kann so verhindern, dass diese mehrfach angezeigt werden.
				Darüber hinaus kann Campaign Manager mithilfe von Cookie-IDs sog. Conversions erfassen, die Bezug zu
				Anzeigenanfragen haben. Das ist etwa der Fall, wenn ein Nutzer eine Campaign Manager-Anzeige sieht und später
				mit demselben Browser die Website des Werbetreibenden aufruft und dort etwas kauft. Laut Google enthalten
				Campaign Manager-Cookies keine personenbezogenen Informationen.</p>
			<p>Aufgrund der eingesetzten Marketing-Tools baut Ihr Browser automatisch eine direkte Verbindung mit dem Server
				von Google auf. Wir haben keinen Einfluss auf den Umfang und die weitere Verwendung der Daten, die durch den
				Einsatz dieses Tools durch Google erhoben werden und informieren Sie daher entsprechend unserem Kenntnisstand:
				Durch die Einbindung von Campaign Manager erhält Google die Information, dass Sie den entsprechenden Teil
				unseres Internetauftritts aufgerufen oder eine Anzeige von uns angeklickt haben. Sofern Sie bei einem Dienst von
				Google registriert sind, kann Google den Besuch Ihrem Account zuordnen. Selbst wenn Sie nicht bei Google
				registriert sind bzw. sich nicht eingeloggt haben, besteht die Möglichkeit, dass der Anbieter Ihre IP-Adresse in
				Erfahrung bringt und speichert.</p>
			<p>Darüber hinaus ermöglichen uns die eingesetzten Campaign Manager (DoubleClick Floodlight)-Cookies zu verstehen,
				ob Sie bestimmte Aktionen auf unserer Website durchführen, nachdem Sie eine unserer Display/Video-Anzeigen auf
				Google oder auf einer anderen Plattform über Campaign Manager aufgerufen oder diese geklickt
				(Conversion-Tracking) haben. Campaign Manager verwendet dieses Cookie, um den Inhalt zu verstehen, mit dem Sie
				auf unseren Websites interagiert haben, um Ihnen später gezielte Werbung zusenden zu können.</p>
			<p>
				Sie können die Teilnahme an diesem Tracking-Verfahren auf verschiedene Weise verhindern:
				a) durch eine entsprechende Einstellung Ihrer Browser-Software, insbesondere führt die Unterdrückung von
				Drittcookies dazu, dass Sie keine Anzeigen von Drittanbietern erhalten;
				b) durch Deaktivierung der Cookies für Conversion-Tracking, indem Sie Ihren Browser so einstellen, dass Cookies
				von der Domain www.googleadservices.com blockiert werden, https://www.google.de/settings/ads , wobei diese
				Einstellung gelöscht werden, wenn Sie Ihre Cookies löschen;
				c) durch Deaktivierung der interessenbezogenen Anzeigen der Anbieter, die Teil der Selbstregulierungs-Kampagne
				„About Ads“ sind, über den Link http://www.aboutads.info/choices, wobei diese Einstellung gelöscht wird, wenn
				Sie Ihre Cookies löschen;
				d) durch dauerhafte Deaktivierung der interessenbezogenen Anzeigen der Anbieter, die Teil der
				Selbstregulierungs-Kampagne „About Ads“ sind, über den Link http://www.aboutads.info/choices, wobei diese
				Einstellung gelöscht wird, wenn Sie Ihre Cookies löschen;
				d) durch dauerhafte Deaktivierung in Ihren Browsern Firefox, Internetexplorer oder Google Chrome unter dem Link
				http://www.google.com/settings/ads/plugin,
				e) mittels entsprechender Cookies Einstellung. Wir weisen Sie darauf hin, dass Sie in diesem Fall gegebenenfalls
				nicht alle Funktionen dieses Web-Angebots vollumfänglich nutzen können.
			</p>
			<p>Darüber hinaus können Sie verhindern, dass Google die durch die Cookies erzeugten Daten über Ihre Nutzung der
				Websites und die Verarbeitung dieser Daten durch Google sammelt, indem Sie das unter
				https://support.google.com/adsense/answer/142293?hl=de unter „Anzeigeeinstellungen“, „Erweiterung für Campaign
				Manager-Deaktivierung“ verfügbare Browser-Plugin herunterladen und installieren.</p>
			<p>Weitere Informationen zu Campaign Manager erhalten Sie unter <a
					href="https://www.google.de/doubleclick">https://www.google.de/doubleclick</a> sowie zum Datenschutz bei
				Google allgemein: <a
					href="https://www.google.de/intl/de/policies/privacy">https://www.google.de/intl/de/policies/privacy</a>.
				Alternativ können Sie die Webseite der Network Advertising Initiative (NAI) unter <a
					href="http://www.networkadvertising.org">http://www.networkadvertising.org</a> besuchen. Google hat sich dem
				EU-US Privacy Shield unterworfen, <a
					href="https://www.privacyshield.gov/EU-US-Framework">https://www.privacyshield.gov/EU-US-Framework</a>.</p>
			<p>
				Die Rechtsgrundlage der Verarbeitung beruht auf Art. 6 Abs. 1 lit.
				f) DSGVO.
			</p>
			<p><b>6.5 Social-Media-Plugins</b></p>
			<p>
				von Facebook, Google+, Twitter und Instagram Plugins
				Auf unserer Website werden sogenannte Social Plugins („Plugins“) der sozialen Netzwerke
				Facebook und Google+, der Mikroblogging-Dienste Twitter und Instagram verwendet. Diese Dienste
				werden von den Unternehmen Facebook Inc., Google Inc., Twitter Inc. und Instagram LLC.
				angeboten („Anbieter“).
				Facebook wird betrieben von der Facebook Inc., 1601 S. California Ave, Palo Alto, CA 94304, USA
				(“Facebook”). Eine Übersicht über die Plugins von Facebook und deren Aussehen finden Sie hier:
				<a href="https://developers.facebook.com/docs/plugins">https://developers.facebook.com/docs/plugins</a>
				Google+ wird betrieben von der Google Inc., 1600 Amphitheatre Parkway, Mountain View, CA
				94043, USA („Google“). Eine Übersicht über die Plugins von Google und deren Aussehen finden Sie
				hier: <a href="https://developers.google.com/+/web/">https://developers.google.com/+/web/</a>
				Twitter wird betrieben von der Twitter Inc., 1355 Market St, Suite 900, San Francisco, CA 94103,
				USA („Twitter“). Eine Übersicht über die Twitter-Buttons und deren Aussehen finden Sie hier:
				<a
					href="https://about.twitter.com/en_us/company/brand-resources.html">https://about.twitter.com/en_us/company/brand-resources.html</a>
				Instagram wird betrieben von der Instagram LLC., 1601 Willow Road, Menlo Park, CA 94025, USA
				(„Instagram“). Eine Übersicht über die Instagram-Buttons und deren Aussehen finden Sie hier:
				<a
					href="http://blog.instagram.com/post/36222022872/introducing-instagram-badges">http://blog.instagram.com/post/36222022872/introducing-instagram-badges</a>
				Wenn Sie eine Seite unseres Webauftritts aufrufen, die ein solches Plugin enthält, stellt Ihr Browser
				eine direkte Verbindung zu den Servern von Facebook, Google, Twitter oder Instagram her. Der
				Inhalt des Plugins wird vom jeweiligen Anbieter direkt an Ihren Browser übermittelt und in die Seite
				eingebunden. Durch die Einbindung der Plugins erhalten die Anbieter die Information, dass Ihr
				Browser die entsprechende Seite unseres Webauftritts aufgerufen hat, auch wenn Sie kein Profil
				besitzen oder gerade nicht eingeloggt sind. Diese Information (einschließlich Ihrer IP-Adresse) wird
				von Ihrem Browser direkt an einen Server des jeweiligen Anbieters in die USA übermittelt und dort
				gespeichert.
				Sind Sie bei einem der Dienste eingeloggt, können die Anbieter den Besuch unserer Website Ihrem
				Profil auf Facebook, Google+, Twitter bzw. Instagram unmittelbar zuordnen. Wenn Sie mit den
				Plugins interagieren, zum Beispiel den „Gefällt mir“-, den „+1“-, den „Twittern“- bzw. den
				„Instagram“-Button betätigen, wird die entsprechende Information ebenfalls direkt an einen Server
				der Anbieter übermittelt und dort gespeichert. Die Informationen werden außerdem in dem sozialen
				Netzwerk, auf Ihrem Twitter- bzw. Instagram-Account veröffentlicht und dort Ihren Kontakten
				angezeigt.
				Zweck und Umfang der Datenerhebung und die weitere Verarbeitung und Nutzung der Daten durch
				die Anbieter sowie Ihre diesbezüglichen Rechte und Einstellungsmöglichkeiten zum Schutz Ihrer
				Privatsphäre entnehmen Sie bitte den Datenschutzhinweisen der Anbieter.
				Datenschutzhinweise von Facebook: <a
					href="http://www.facebook.com/policy.php">http://www.facebook.com/policy.php</a>
				Datenschutzhinweise von Google: <a
					href="http://www.google.com/intl/de/+/policy/+1button.html">http://www.google.com/intl/de/+/policy/+1button.html</a>
				Datenschutzhinweise von Twitter: <a href="https://twitter.com/privacy">https://twitter.com/privacy</a>
				Datenschutzhinweise von Instagram <a
					href="https://help.instagram.com/155833707900388/">https://help.instagram.com/155833707900388/</a>
				Wenn Sie nicht möchten, dass Google, Facebook, Twitter oder Instagram die über unseren
				Webauftritt gesammelten Daten unmittelbar Ihrem Profil in dem jeweiligen Dienst zuordnen, müssen
				Sie sich vor Ihrem Besuch unserer Website bei dem entsprechenden Dienst ausloggen. Sie können
				das Laden der Plugins auch mit Add-Ons für Ihren Browser komplett verhindern, z. B. mit dem
				Skript-Blocker „NoScript“ (http://noscript.net/).
			</p>
			<p><b>6.6 MessengerPeople</b></p>
			<p>Auf unserer Website haben Sie die Möglichkeit über einen Messenger-Dienst mit uns Kontakt aufzunehmen. Hierfür
				verwenden wir das Double-Opt-In-Verfahren, d.h. Sie erhalten zur Verifizierung eine Bestätigungsnachricht.</p>
			<p>Hierfür arbeiten wir mit dem Dienstleister MessengerPeople zusammen. Das Unternehmen stellt die Infrastruktur
				für den Versand der Benachrichtigungen bereit und verarbeitet die Daten in unserem Auftrag gemäß der gemäß der
				datenschutzrechtlichen Gesetzeslage. Erhobenen Informationen werden nur für die Bereitstellung des Dienstes
				genutzt. Dritte erhalten Ihre Daten nicht.</p>
			<p>Daten, die wir von Ihnen bzw. MessengerPeople zur Verfügung gestellt bekommen, nachdem Sie sich angemeldet
				haben, können Ihre bei der Messenger Plattform hinterlegten Benutzerdaten (die Ihren Vor- und Nachnamen
				enthalten können), Ihre Telefonnummer, Ihr Nutzungsgerät, ihre Messenger-ID, Ihr Profilbild sowie Ihr Chat- bzw.
				Nachrichtenverlauf mit uns sein.</p>
			<p>Diese Daten helfen uns dabei, Ihnen individuelle Nachrichten anhand Ihrer Präferenzen zu senden. Weitere
				Informationen, die Sie über den jeweiligen Chat individuell zur Verfügung stellen, werden automatisch
				gespeichert.</p>
			<p>Sie haben jederzeit die Möglichkeit, unseren Service mit einer individuellen Nachricht zu beenden. Dafür senden
				Sie im Messenger „STOP“. Sie erhalten bis zu einer neuen Anmeldung keine weiteren Nachrichten.</p>
			<p>Ebenfalls haben Sie die Möglichkeit, alle von Ihnen gespeicherten Daten entfernen zu lassen, senden Sie hierfür
				eine Nachricht mit dem Text „ALLE DATEN LOESCHEN“ über Ihren Messenger und Ihre Daten werden gelöscht.</p>
			<p>Die Rechtsgrundlage der Verarbeitung beruht auf Art. 6 Abs. 1 lit. a) DSGVO.</p>
			<p>
				Mehr über den Datenschutz bei MessengerPeople erfahren Sie hier.
				<a
					href="https://www.messengerpeople.com/de/datenschutzerklaerung">https://www.messengerpeople.com/de/datenschutzerklaerung</a>
			</p>
			<p>Ihre erteilte Einwilligung in die Datenverarbeitung ist gemäß Art. 7 Abs. 3 DSGVO jederzeit frei widerrufbar.
				Hierzu haben Sie als Verbraucher die Möglichkeit uns jederzeit mit der Bitte zu kontaktieren, ihre Informationen
				und die von Ihnen erhobenen personenbezogenen Daten fortan nicht mehr zu verarbeiten und vorhandene Daten und
				Informationen zu löschen.</p>
			<p><b>7. Übermittlung ihrer Daten an Dritte</b></p>
			<p>Wir übermitteln Ihre personenbezogenen Daten nur, soweit es für die vertragliche Ausgestaltung des
				Vermittlungsverhältnisses erforderlich ist an von uns individuell ausgewählte Anbieter. Eine Weitergabe der
				Daten an Dritte zu anderen Zwecken erfolgt nicht.</p>
			<p>Rechtsgrundlage hierfür ist Art. 6 Abs. 1 lit. b) DSGVO, der die Verarbeitung von Daten zur Erfüllung eines
				Vertrags oder vorvertraglicher Maßnahmen gestattet.</p>
			<p><b>8. Empfänger ihrer Daten</b></p>
			<p>Wir setzten zur Bereitstellung unserer Webanwendungen externe Dienstleister (z.B. Dienstleister für den
				Newsletterversand) ein. Diese erhalten lediglich Zugang zu solchen persönlichen Informationen, die zur Erfüllung
				der jeweiligen Tätigkeit erforderlich sind. Es ist diesen Dienstleistern untersagt, Ihre persönlichen
				Informationen daneben zu anderen Zwecken zu verwenden. Mit diesen Dienstleistern wurden vertragliche
				Vereinbarungen i.S.d Art. 28 DSGVO geschlossen.</p>
			<p><b>9. Schlussbestimmungen</b></p>
			<p>Dieser Vertrag sowie alle damit im Zusammenhang stehenden außervertraglichen Schuldverhältnisse unterliegen dem
				Recht der Bundesrepublik Deutschland.</p>
			<p>Sollten einzelne Bestimmungen dieser Datenschutzerklärung nichtig sein, so wird hierdurchdie Rechtsgültigkeit
				im Übrigen nicht berührt.</p>
			<p>Wir haben umfangreiche technische und betriebliche Schutzvorkehrungen getroffen, um Ihre Daten vor zufälligen
				oder vorsätzlichen Manipulationen, Verlust, Zerstörung oder dem Zugriff unberechtigter Personen zu schützen.
				Unsere Sicherheitsverfahren werden regelmäßig überprüft und dem technologischen Fortschritt angepasst.</p>
			<p>Bitte beachten Sie, dass diese Datenschutzerklärung ausschließlich für Internetseiten von Vergleichs-Guru gilt.
				Soweit unsere Seiten Links auf Internetseiten Dritter enthalten, gilt unsere Datenschutzerklärung nicht für
				diese. Bitte informieren Sie sich auf den jeweiligen Seiten über die dort geltenden Datenschutzbestimmungen.</p>
			<p>Weitere Angaben zu uns finden Sie in unserem Impressum: Impressum.</p>
			<p>Falls noch Fragen offen sind oder Sie Anregungen und Wünsche haben, können Sie sich jederzeit mit einer E-Mail
				an <a href="mailto:Datenschutz@cooper-immobilien.com">Datenschutz@cooper-immobilien.com</a> wenden.</p>
			<p>Stand September 2019</p> -->
		</div>
	</div>
</section>

<?php get_footer(); ?>
