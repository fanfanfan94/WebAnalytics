<?php

//
// Open Web Analytics - An Open Source Web Analytics Framework
//
// Copyright 2006 Peter Adams. All rights reserved.
//
// Licensed under GPL v2.0 http://www.gnu.org/copyleft/gpl.html
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
// $Id$
//

require_once(OWA_PHPMAILER_DIR.'class.phpmailer.php');

/**
 * phpmailer wrapper class
 * 
 * @author      Peter Adams <peter@openwebanalytics.com>
 * @copyright   Copyright &copy; 2006 Peter Adams <peter@openwebanalytics.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GPL v2.0
 * @category    owa
 * @package     owa
 * @version		$Revision$	      
 * @since		owa 1.0.0
 */

class owa_mailer extends owa_base {
		
	var $mailer;
	
	/**
	 * Constructor
	 *
	 * @return owa_mailer
	 */
	function __construct() {
	
		parent::__construct();
		
		$this->mailer = new PHPMailer();

		$this->mailer->CharSet = "GB2312"; 
		
		if ( owa_coreAPI::getSetting( 'base', 'mailer-from' ) ) {
		
			$this->mailer->From = owa_coreAPI::getSetting( 'base', 'mailer-from' );
		}
		
		if ( owa_coreAPI::getSetting( 'base', 'mailer-fromName' ) ) {
			
			$this->mailer->FromName = owa_coreAPI::getSetting( 'base', 'mailer-fromName' );
		}
		
		if ( owa_coreAPI::getSetting( 'base', 'mailer-use-smtp' ) ) {
		
			$this->mailer->IsSMTP(); // telling the class to use SMTP
			
			if ( owa_coreAPI::getSetting( 'base', 'mailer-host' ) ) {
		
				$this->mailer->Host = owa_coreAPI::getSetting( 'base', 'mailer-host' );
			}
			
			if ( owa_coreAPI::getSetting( 'base', 'mailer-port' ) ) {
			
				$this->mailer->Port =  owa_coreAPI::getSetting( 'base', 'mailer-port' );
			}
			
			if ( owa_coreAPI::getSetting( 'base', 'mailer-smtpAuth' ) ) {
				
				$this->mailer->SMTPAuth = owa_coreAPI::getSetting( 'base', 'mailer-smtpAuth' );
			}
			
			if ( owa_coreAPI::getSetting( 'base', 'mailer-username') && owa_coreAPI::getSetting( 'base', 'mailer-password') ) {
				
				$this->mailer->Username = owa_coreAPI::getSetting( 'base', 'mailer-username');
				$this->mailer->Password = owa_coreAPI::getSetting( 'base', 'mailer-password');
			}		
		}
	}
	
	function sendMail() {
	
		if( ! $this->mailer->Send() ) {
			
			return $this->e->debug(sprintf("Mailer Failure. Was not able to send with subject of '%s'. Error Msgs: '%s'", $this->mailer->Subject, $this->mailer->ErrorInfo));
			
		} else {
			return owa_coreAPI::debug( sprintf ("Mail sent with the subject of '%s'.", $this->mailer->Subject ) );
		}
	}
	
	function send() {
		
		return $this->sendMail();
	}
	
	function addAddress( $address, $name ) {
		
		$this->mailer->AddAddress( $address, $name );
	}
	
	function setFrom( $address, $name ) {
		
		$this->mailer->SetFrom( $address, $name );
	}
	
	function setHtmlBody ( $html ) {
		
		$this->mailer->MsgHTML( $html );
	}
	
	function setAltBody ( $text ) {
		
		$this->mailer->AltBody =  $text;
	}
	
	function setSubject( $subject ) {
	
		$this->mailer->Subject = $subject;
	}
	
	function addReplyTo( $address, $name ) {
	
		$this->mailer->AddReplyTo( $address, $name );
	}
	
	function addAttachment( $attachment ) {
	
		$this->mailer->AddAttachment( $attachment );
	}
	
}

?>