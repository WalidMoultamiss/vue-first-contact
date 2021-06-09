const app = Vue.createApp({
  data() {
    return {
      showthis: true,
      books: [
        {
          title: "title sibling",
          author: "mhido",
          isFav: true,
          img: "./assets/beach-book.webp",
        },
        {
          title: "title dderf",
          author: "mhefefido",
          isFav: false,
          img: "./assets/book1.jpg",
        },
        {
          title: "titlsse sibliqsqsng",
          author: "mhidsqso",
          isFav: true,
          img: "./assets/justice_4.png",
        },
        {
          title: "titlsse sibliqsqsng",
          author: "mhidsqso",
          isFav: false,
          img: "./assets/Magic-Book.png",
        },
        {
          title: "titlsse sibliqsqsng",
          author: "mhidsqso",
          isFav: false,
          img: "./assets/Magic-Book.png",
        },
      ],
    };
  },
  methods: {
    changetitle(title) {
      this.title = title;
    },
    showthisthing() {
      this.showthis = !this.showthis;
    },
    handleEvent(e) {
      console.log(e.clientX);
    },
    toggleShowBooks() {
      this.showBooks = !this.books;
    },
    favMe(ktab) {
      console.log(ktab);
      ktab.isFav = !ktab.isFav;
      console.log(ktab);
    },
  },
  computed: {
    filteredBooks(){
        return this.books.filter((ktab)=>ktab.isFav)
    }
  }
});
app.mount("#app");
