<template lang="html">
  <div class="chat-composer">
  	<input class="no-margin-button" type="text" placeholder="tulis pesan anda..." v-model="messageText" @keydown.enter="sendMessage">
	<button type="button" class="btn btn-send waves waves-light" @click="sendMessage">
		<i class="material-icons">send</i>
	</button>
  </div>
</template>

<script>

export default {
	data() {
		return {
			messageText : ""
		}
	},
	methods : {
		sendMessage() {
			if ( this.messageText.trim().length <= 1 ) {
				alert('teks terlalu pendek');
			} else {
				this.$emit('messagesent', {
					id_detail_kursus 	: $('#KJashkjasdb').val(),
					dari 				: $('#aASDbjkbasd').val(),
					pesan 				: this.messageText,
					created_at			: moment().format("YYYY-MM-DD HH:mm:ss"),
				});
				this.messageText = '';
				$(".chat-log").animate({ scrollTop: $('.chat-log')[0].scrollHeight}, 1000);
			}
		}
	}
}
</script>

<style lang="css">
	.chat-composer {
		display: flex;
	}

	.chat-composer input {
		flex: 1 auto;
	}

	.chat-composer button {
		flex: none;
	}
	.btn-send {
		margin-top: 10px;
		/*width: 100px;*/
		margin-left: 15px;
		display: inline;
	}
</style>
