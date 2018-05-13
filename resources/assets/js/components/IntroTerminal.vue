<template>
  <div id="terminal" :class="{'full-height' : showTerminal}">
    <div class="menu-bar">
      <div class="fake-button maximize-button"></div>
      <div class="fake-button minimize-button"></div>
      <div class="fake-button close-button"></div>
    </div>
    <div id="terminal-body" class="m-2">
      <span v-for="text in terminalText" :key="text.id" :class="{'d-none' : !text.visible}" class="font-weight-bold console-font">
        <span style="color:#d33682;">vern@superkitty</span>
        <span style="color:#586e75;">:</span>
        <span style="color:#268bd2;">{{text.directory}}</span>
        <span style="color:#586e75">$</span>
        <span :class="text.className" class="console-font" style="color:#839496; white-space:pre-wrap; word-wrap: break-word; word-break: break-word;"></span>
        <br>
      </span>
    </div>
  </div>
</template>

<script>
import Typed from 'typed.js';

export default {
  name: 'IntroTerminal',
  props: ['showTerminal'],
  data() {
    return {
      terminalCount: 0,
      scrolling: 0,
      terminalText: [
        {
          id: 1,
          className: 'typed-script-1',
          visible: true,
          directory: '~',
          options: {
            strings: [
              "git clone https://github.com/fvhockney/dotfiles ^1000\n`Cloning into 'Revolution'...`^500\n`...(`^300\n`remote: Total 35689 (delta 5), reused 8 (delta 0)`^1000\n`Receiving objects: 100% (35689/35689), 54.08 MiB | 2.04 MiB/s,`^1500 `done.`^1500\n``\n`Resolving deltas: 100% (14587/14587),`^750 `done.`^700\n`Checking connectivity...`^2000 `done`"
            ],
            typeSpeed: 30,
            showCursor: true,
            cursorChar: '&#9608;',
            startDelay: 1700,
            preStringTyped: ( self ) => {
              this.scrolling = setInterval( this.shouldScroll, 100 )
              this.shouldScroll()
            },
            onComplete: ( self ) => {
              self.el.nextSibling.remove()
              this.clearScrolling()
              this.nextTermCommand()
            }
          }
        },
        {
          id: 2,
          className: 'typed-script-2',
          visible: false,
          directory: '~',
          options: {
            strings: [
              "cd Revolution"
            ],
            typeSpeed: 30,
            showCursor: true,
            cursorChar: '&#9608;',
            startDelay: 1700,
            preStringTyped: ( self ) => {
              this.scrolling = setInterval( this.shouldScroll, 100 )
              this.shouldScroll()
            },
            onComplete: ( self ) => {
              self.el.nextSibling.remove()
              this.clearScrolling()
              this.nextTermCommand()
            }
          }
        },
        {
          id: 3,
          className: 'typed-script-3',
          visible: false,
          directory: '~/Revolution',
          options: {
            strings: [
              "./diplomacy ^1700\n`No such file found`"
            ],
            typeSpeed: 30,
            showCursor: true,
            cursorChar: '&#9608;',
            startDelay: 1700,
            preStringTyped: ( self ) => {
              this.scrolling = setInterval( this.shouldScroll, 100 )
              this.shouldScroll()
            },
            onComplete: ( self ) => {
              self.el.nextSibling.remove()
              this.clearScrolling()
              this.nextTermCommand()
            }
          }
        },
        {
          id: 4,
          className: 'typed-script-4',
          visible: false,
          directory: '~/Revolution',
          options: {
            strings: [
              "./a^300n^300a^200r^250c^312h^400y^1200\n`You must be an administrator to execute this file`"
            ],
            typeSpeed: 30,
            showCursor: true,
            cursorChar: '&#9608;',
            startDelay: 1700,
            preStringTyped: ( self ) => {
              this.scrolling = setInterval( this.shouldScroll, 100 )
              this.shouldScroll()
            },
            onComplete: ( self ) => {
              self.el.nextSibling.remove()
              this.clearScrolling()
              this.nextTermCommand()
            }
          }
        },
        {
          id: 5,
          className: 'typed-script-5',
          visible: false,
          directory: '~/Revolution',
          options: {
            strings: [
              "sudo !!^850\n`password:`^1750\n`Welcome to the revolution`"
            ],
            typeSpeed: 30,
            showCursor: true,
            cursorChar: '&#9608;',
            startDelay: 1700,
            preStringTyped: ( self ) => {
              this.scrolling = setInterval( this.shouldScroll, 100 )
              this.shouldScroll()
            },
            onComplete: ( self ) => {
              self.el.nextSibling.remove()
              this.clearScrolling()
              this.nextTermCommand()
            }
          }
        },
        {
          id: 6,
          className: 'typed-script-6',
          visible: false,
          directory: '~/Revolution',
          options: {
            strings: [ '&nbsp;' ],
            typeSpeed: 0,
            showCursor: false,
            startDelay: 500,
            preStringTyped: ( self ) => {
              this.scrolling = setInterval( this.shouldScroll, 100 )
              this.shouldScroll()
            },
            onComplete: ( self ) => {
              this.clearScrolling()
            }
          }
        },
      ],
    }
  },

  watch: {
    terminalCount: function(){
      if (this.terminalCount+1 === this.terminalText.length) {
        document.getElementById('terminal').classList.add('fade')
        setTimeout(() => {this.$emit('completed');}, 3000)
      }
    },

    showTerminal: function(){
      if (this.showTerminal === true) {
        this.typeStuff()
      }
    },
  },

  computed: {
    terminalTextLength: function(){
      return this.terminalText.length
    }
  },

  methods: {
    nextTermCommand: function() {
      this.terminalCount++
        this.terminalText[ this.terminalCount ].visible = true
      this.typeStuff()
    },

    typeStuff: function() {
      new Typed( '.' + this.terminalText[ this.terminalCount ].className, this.terminalText[ this.terminalCount ].options )
    },

    shouldScroll: function() {
      let windowHeight = window.innerHeight
      let bodyHeight = document.getElementById( 'terminal' )
        .scrollHeight
      if ( windowHeight < bodyHeight ) {
        let elem = document.getElementsByClassName( this.terminalText[ this.terminalCount ].className )[ 0 ]
        elem.scrollIntoView( {
          block: 'end'
        } )
      }
    },

    clearScrolling: function() {
      clearInterval( this.scrolling )
    },

  },

}
</script>

<style lang="scss" scoped>
#terminal {
    background-color: #002b36;
    overflow: auto;
    .menu-bar {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        width: 100%;
        min-height: 40px;
        background-color: #073642;
        .fake-button {
            border-radius: 50%;
            margin: 5px;
            height: 18px;
            width: 18px;
        }
        .maximize-button {
            background-color: #859900;
        }
        .close-button {
            background-color: #dc322f;
        }
        .minimize-button {
            background-color: #b58900;
        }
    }
}

.console-font {
    font-family: 'Lucida Console', Monaco, monospace;
}

.fade {
  transition: all 3s;
  transition-delay: 2s;
  opacity: 0;
  transform: scale(4);
}

</style>
