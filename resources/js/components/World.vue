<template class="text-center">
    <div>
        <carousel
            :centerMode="true"
            :loop="true"
            :scrollPerPage="false"
            :autoplayTimeout="4000"
            :speed="2000"
            :autoplay="true"
            :paginationEnabled="false"
            :perPageCustom="[
                [300, 1],
                [350, 1],
                [768, 5]
            ]"
        >
            <slide v-for="post in posts" :key="post.id">
                <div class="card m-1">
                    <span class="badge badge-dark">{{
                        niceDate(post.publishedAt)
                    }}</span>

                    <img
                        class="card-img-top"
                        :src="post.urlToImage"
                        alt="Card image cap"
                    />

                    <div class="card-body">
                        <h5 class="card-title text-uppercase">
                            {{ shorten(post.title) }}
                        </h5>
                        <p class="card-text">
                            {{ shorten(post.description, 60) }}
                        </p>
                        <a :href="post.url" class="btn btn-dark">{{
                            post.author
                        }}</a>
                    </div>
                </div>
            </slide>
        </carousel>
    </div>
</template>
<script>
import axios from "axios";
import { Carousel, Slide } from "vue-carousel";
import moment from "moment";

export default {
    components: {
        Carousel,
        Slide
    },
    data() {
        return {
            posts: null
        };
    },
    mounted: function() {
        const proxyUrl = "https://cors-anywhere.herokuapp.com/";
        const apiKey = "2a571f1425d44f8ab56de12e0e0e9b1b";
        const url = `${proxyUrl}https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=${apiKey}`;
        axios
            .get(url)
            .then(response => {
                this.posts = [];
                response.data.articles.forEach(posts => {
                    this.posts.push(this.extractData(posts));
                });
            })
            .catch(response => {
                console.log(response);
            });
    },
    methods: {
        extractData({
            author,
            content,
            description,
            publishedAt,
            title,
            urlToImage,
            url
        }) {
            return {
                author,
                content,
                description,
                publishedAt,
                title,
                urlToImage,
                url
            };
        },
        shorten(text, len = 35) {
            return _.truncate(text, { length: len });
        },
        niceDate(datetime) {
            return moment(datetime).fromNow();
        }
    }
};
</script>
<style lang="scss" scoped>
.card {
    width: 23rem;
}
@media screen and (max-width: 370px) {
    .card {
        width: 17rem;
    }

    .card-title {
        font-size: 0.9em;
    }
    .card-text {
        font-size: 0.8em;
    }
    .card-body > a
     {
        font-size: 0.8em;
    }
    .card > span{
        font-size: 0.6em;
    }
}
@media screen and (max-width: 300px) {
    .card {
        width: 14rem;
    }

    .card-title {
        font-size: 0.7em;
    }
    .card-text {
        font-size: 0.6em;
    }
    .card-body > a
     {
        font-size: 0.6em;
    }
    .card > span{
        font-size: 0.5em;
    }
}
</style>
