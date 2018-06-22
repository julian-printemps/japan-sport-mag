<template>
    <footer class="footer">
        <div class="fade_in_intro columns is-centered is-multiline is-mobile">
            <section class="column is-10 is-10-tablet is-8-desktop text-center">
                <h2 class="footer--logo--holder">
                    <router-link :to="{ name: navRoutes.home }" title="Home">
                        <img src="/static/img/logo/logo-1.png" class="footer--logo" alt="Japan Sport Magazine">
                    </router-link>
                    <strong class="seo">Japan Sport Magazine</strong>
                </h2>

                <div class="sns_footer_block">
                    <ul class="columns is-gapless is-mobile is-center">
                        <li class="column is-narrow">
                            <a href="https://www.facebook.com/Japan-Sports-Magazine-JSM-411227446019495/" class="sns_block--link" title="Facebook" target="_blank"><svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>
                        </li>
                        <!--<li class="column is-narrow">-->
                            <!--<a href="https://twitter.com/namae_ibaraki" class="sns_block&#45;&#45;link" title="Twitter" target="_blank"><svg class="icon icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a>-->
                        <!--</li>-->
                        <li class="column is-narrow">
                            <a href="mailto:chris@bropublishing.com" class="sns_block--link" title="Email"><svg class="icon icon-paper-plane"><use xlink:href="#icon-paper-plane"></use></svg></a>
                        </li>
                    </ul>
                </div>

                <p class="footer--credits">© 2018 Bro. Publishing</p>
            </section>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'footer-tag',
    data () {
        return {
        }
    },

    computed: {
        lang () {
            return this.$route.meta.lang
        },
        navRoutes () {
            return {
                home: 'Home-' + this.lang
                // about: 'About-' + this.lang,
                // partners: 'Partners-' + this.lang,
                // archives: 'Archives-' + this.lang,
                // contact: 'Contact-' + this.lang
            }
        }
    }
}
</script>
