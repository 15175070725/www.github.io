import dynamic from 'next/dynamic';
import Layout from 'layout/Layout';
import Seo from 'Seo';
import styles from '../styles/Home.module.scss';
import HomeLoading from '@/components/loading';
import useLoaded from 'hooks/useLoaded';
import ScrollShow from '@/components/content/scroll-show';
import { components_data, HandsomeComponent } from '../common/exports_data';
import { GetStaticProps } from 'next/types';
import { getAllFilesFrontmatter } from 'lib/mdx';
import classNames from 'classnames';
const Banner = dynamic(import('content/banner'), { ssr: false });

interface IProps {
  components_data: HandsomeComponent[];
}
export default function Home({ components_data }: IProps) {
  const isLoaded = useLoaded();

  return (
    <Layout>
      <Seo templateTitle="Orz" />
      <HomeLoading isLoaded={isLoaded} />
      <div className={styles.home__wrap}>
        <Banner />
        <ScrollShow components_data={components_data} />
      </div>
    </Layout>
  );
}

export const getStaticProps: GetStaticProps = async ({ params }) => {
  components_data.map(async e => {
    e.children = await getAllFilesFrontmatter(e.index);
  });
  return {
    props: { components_data }
  };
};
