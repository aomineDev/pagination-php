const articles = document.querySelectorAll('.article')
const articleWrapper = document.getElementById('article-wrapper')
const links = document.querySelectorAll('.pagination-link')
const next = document.getElementById('next')
const prev = document.getElementById('prev')

links.forEach(link => {
	link.addEventListener('click', () => handleClick(link))
})

async function handleClick (link) {
	articleWrapper.classList.add('article-mask')
	
	links.forEach(link => {
		link.classList.add('disable')
	})

	const active = document.querySelector('.active')
	const activeId = parseInt(active.id)

	let id = link.id
	let node = link

	if(id === 'next') {
		id = activeId + 1
		node = document.getElementById(id)
	}
	
	if(id === 'prev') {
		id = activeId - 1
		node = document.getElementById(id)
	}

	id = parseInt(id)

	await getArticles(id)

	active.classList.remove('active')
	node.classList.add('active')
}

function getArticles (page) {
	return new Promise(resolve => {
		const apiUrl = ''
		fetch(apiUrl + '?page=' + page) 
		.then(response => response.json())
		.then(response => {
			handleResponse(response, page)
			resolve()
		})
		.catch(() => {
			articleWrapper.classList.remove('article-mask')
		
			links.forEach(link => {
				link.classList.remove('disable')
			})

			alert("Ha ocurrido un error")
		})
	})
}

function handleResponse (response, id) {	
	articles.forEach((article, i) => {
	  article.innerHTML = '<span class="article-index">' + response[i].ID + '. </span>' + response[i].lista
	})

	articleWrapper.classList.add('loader-1')

	const transition = 500

	setTimeout(() => {
		articleWrapper.classList.add('loader-2')
		articleWrapper.classList.remove('loader-1')
	}, transition)

	setTimeout(() => {
		articleWrapper.classList.remove('loader-2')
	}, transition + 50)

	setTimeout(() => {
		articleWrapper.classList.remove('article-mask')

		links.forEach(link => {
			link.classList.remove('disable')
		})

		if (id === 1) prev.classList.add('disable')

		if(id === 4) next.classList.add('disable')
	}, (transition * 2) + 50)
}
