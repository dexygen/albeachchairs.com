{
    const carouselRoot = document.getElementById("abc-carousel");
    const carouselImgDivs = [...carouselRoot.querySelectorAll("div")];

    setInterval(() => {
      const currentIsBlockIndex = carouselImgDivs.findIndex((imgDiv) => {
        return imgDiv.className === 'is-block';
      });
	  
      const nextIsBlockIndex = currentIsBlockIndex === carouselImgDivs.length - 1 ? 0 : currentIsBlockIndex + 1;
      // the above can be shortened, I've seen a code snippet on the internet

      carouselImgDivs[currentIsBlockIndex].classList.remove('is-block');
      carouselImgDivs[currentIsBlockIndex].classList.add('is-hidden');
    
      carouselImgDivs[nextIsBlockIndex].classList.remove('is-hidden');
      carouselImgDivs[nextIsBlockIndex].classList.add('is-block');
    }, 4000);
}